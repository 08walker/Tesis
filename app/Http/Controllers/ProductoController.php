<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Producto;
use App\Traza;
use App\UnidadMedida;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $this->authorize('view',new Producto);
        
        return view('producto.index')
            ->with('productos', Producto::activos()->get());
    }

    public function create()
    {
        $producto = new Producto;
        $this->authorize('create',$producto);
        $unidades = UnidadMedida::activos()->get();
        return view('producto.create',compact('unidades','producto'));
    }

    public function store(StoreProductoRequest $request)
    {
        $this->authorize('create',new Producto);
        $data = request()->all();
        //dd($data);
        $producto = Producto::create([
            'name'=> $data['name'],
            'identificador'=> $data['identificador'],
            'description'=> $data['description'],
            'unidad_medida_id'=> $data['unidad_medida_id'],
        ]);
        if ($producto) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "El producto {$producto->name} ha sido creado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
            return redirect()->route('productos')->with('success','El producto ha sido creado con éxito');
        }
        return back()->withInput()->with('demo','Error al crear el nuevo Producto');
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('producto.show',compact('producto'));
    }

    public function edit(Producto $producto)
    {
        $this->authorize('update',$producto);
        $unidades = UnidadMedida::all();
        return view('producto.edit',compact('producto','unidades'));
    }

    public function update(StoreProductoRequest $request, Producto $producto)
    {        
        $this->authorize('update',$producto);
        $data = request()->all(); 
        //dd($data);

        $producto->update($data);

        if ($producto) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "El producto {$producto->name} ha sido actualizado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
            return redirect()->route('productos')->with('success','Producto actualizado con éxito');
           }
        return back()->withInput()->with('demo','Error al actualizar el producto');
    }

    public function destroy(Producto $producto)
    {
        $this->authorize('delete',$producto);

        $nombre = auth()->user()->name;
        $ip = request()->ip();
        
        try {
         $producto->delete();   
        }   catch (QueryException $e) {
               $arrayName = $e->errorInfo;
               if ($arrayName[1] == 1451) {
                   $producto->update(['activo'=>'0']);

                    Traza::create([
                    'description'=> "El producto {$producto->name} ha sido desactivado por el usuario {$nombre}",
                    'ip'=>$ip,
                    ]);
                    return redirect()->route('productos')
                        ->with('success', 'El producto ha sido desactivado');   
               }
               return redirect()->route('productos')
                    ->with('demo', 'El producto no ha sido ser eliminado');
        }
        $nombre = auth()->user()->name;
            Traza::create([
            'description'=> "El producto {$producto->name} ha sido eliminado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
        return redirect()->route('productos')
                    ->with('success', 'El producto ha sido eliminado con éxito');
    }
}
