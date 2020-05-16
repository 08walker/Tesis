<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Producto;
use App\UnidadMedida;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        return view('producto.index')
            ->with('productos', Producto::all());
    }

    public function create()
    {
        $producto = new Producto;
        $unidades = UnidadMedida::all();
        return view('producto.create',compact('unidades','producto'));
    }

    public function store(StoreProductoRequest $request)
    {
        $data = request()->all();
        //dd($data);
        $producto = Producto::create([
            'name'=> $data['name'],
            'identificador'=> $data['identificador'],
            'description'=> $data['description'],
            'unidad_medida_id'=> $data['unidad_medida_id'],
        ]);
        if ($producto) {
            return redirect()->route('productos')->with('success','El producto ha sido creado con éxito');
        }
        return back()->withInput()->with('errors','Error al crear el nuevo Producto');
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('producto.show',compact('producto'));
    }

    public function edit(Producto $producto)
    {
        $unidades = UnidadMedida::all();
        return view('producto.edit',compact('producto','unidades'));
    }

    public function update(StoreProductoRequest $request, Producto $producto)
    {        
        $data = request()->all(); 
        //dd($data);

        $producto->update($data);

        if ($producto) {
            return redirect()->route('productos')->with('success','Producto actualizado con éxito');
           }
        return back()->withInput()->with('error','Error al actualizar el producto');
    }

    public function destroy(Producto $producto)
    {
        try {
         $producto->delete();   
        }   catch (QueryException $e) {
               $arrayName = $e->errorInfo;
               if ($arrayName[1] == 1451) {
                   $producto->update(['activo'=>'0']);
                    return redirect()->route('productos')
                        ->with('success', 'El producto ha sido desactivado');   
               }
               return redirect()->route('productos')
                    ->with('errors', 'El producto no ha sido ser eliminado');
        }
        return redirect()->route('productos')
                    ->with('success', 'El producto ha sido eliminado con éxito');
    }
}
