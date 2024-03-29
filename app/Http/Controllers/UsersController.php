<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Traza;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function index()
    {
        $this->authorize('view',new User);
        
        $users = User::activos()->get();
        return view('users.index',compact('users'));
    }

    public function create()
    {
        $this->authorize('create',new User);

        //Para que el foreach no de error
        $user = New User;
        //Para optener las relaciones del objeto
        $roles = Role::with('permissions')->get();
        
        //Devuelve un arreglo con el id y el nombre
        $permissions = Permission::pluck('display_name','id');
        return view('users.create', compact('user','roles','permissions'));
    }

    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],
        [  
            'name.required'=>'Debe introducir el nombre',
            'password.min'=>'La contraseña debe tener mas de 6 caracteres',
            'password.confirmed'=>'Las contraseñas no coinciden',
            'email.unique'=>'El correo electronico ya está en uso',
        ]);
        
        $user = User::create($data);

        //Asiganmos los roles
        if ($request->filled('roles')) {
            $user->assignRole($request->roles);
        }
        
        //Asignamos los permisos
        if ($request->filled('permissions')) {
            $user->givePermissionTo($request->permissions);            
        }

        //Regresamos al usuario
        $nombre = auth()->user()->name;
        $ip = request()->ip();
            Traza::create([
            'description'=> "En usuario {$user->name} ha sido creado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
        return redirect()->route('user.index')->with('success','Usuario creado con éxito');

    }

    public function show(User $user)
    {
        $this->authorize('view',$user);

        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update',$user);

        //Para optener las relaciones del objeto
        $roles = Role::with('permissions')->get();
        
        //Devuelve un arreglo con el id y el nombre
        $permissions = Permission::pluck('name','id');
        if ($user->id!==1) {
            return view('users.edit', compact('user','roles','permissions'));
        }else
        {
            $users = User::all();
            return view('users.index',compact('users'));
        }
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        
        if ($user) {
        $nombre = auth()->user()->name;
        $ip = request()->ip();
        Traza::create([
        'description'=> "Usuario {$user->name} actualizado por el usuario {$nombre}",
        'ip'=>$ip,
        ]); 
        return redirect()->route('user.edit', $user)->with('success','Usuario actualizado con éxito');
        }
        return back()->withInput()->with('demo','Error al actualisar el nuevo usuario');
    }

    public function destroy(User $user)
    {
        //$this->authorize('delete',$user);
        $nombre = auth()->user()->name;
        $ip = request()->ip();
        
        try {
         $user->delete();   
        }   catch (QueryException $e) {
               $arrayName = $e->errorInfo;
               if ($arrayName[1] == 1451) {
                   $user->update(['activo'=>'0']);
                    Traza::create([
                    'description'=> "El usuario {$user->name} ha sido desactivado por el usuario {$nombre}",
                    'ip'=>$ip,
                    ]);
                    return redirect()->route('user.index')
                        ->with('success', 'El usuario ha sido desactivado');   
               }
               return redirect()->route('user.index')
                    ->with('demo', 'El usuario no ha sido ser eliminado');
        }
        
        Traza::create([
        'description'=> "El usuario {$user->name} eliminado por el usuario {$nombre}",
        'ip'=>$ip,
        ]);
        return redirect()->route('user.index')
                    ->with('success', 'El usuario ha sido eliminado con éxito');
    }

    public function desactivados()
    {
        $this->authorize('view',new User);        
        return view('users.desactivados')
        ->with('users', User::noactivos()->get());
    }

    public function activar(Request $request, User $user)
    {
        $this->authorize('update',$user);
        if ($request['activo']) {
            $data['activo'] = 1;
            $user->update($data);

            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "El user {$user->name} ha sido activado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);

            return back()->with('success', 'El usuario ha sido activado con éxito');
        }
        return back()->with('demo', 'El usuario no se ha activado');
    }
}