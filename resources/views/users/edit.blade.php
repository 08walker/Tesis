@extends('admin.layout')

@section('content')
<div class="content-wrapper">
      <div class="content-header">
         <div class="container">
            <div class="row mb-2">
               <div class="col-sm-6">
                  <h1 class="m-0 text-dark"> Crear usuario</h1>
               </div>
            </div><!-- /.row -->
         </div><!-- /.container-fluid -->
      </div>

    @include('partials.success')
    @include('partials.errors')

      <div class="content">
<div class="container">
   <div class="row">
 	<div class="col-md-6">
		<div class="card card-primary card-outline">
			<div class="card-header">
            	<h5 class="card-title">Editar usuario </h5>
            </div>
            <div class="card-body">
                  @if($errors->any())
                        <ul class="list-group">
                              @foreach($errors->all() as $error)
                                    <li class="list-group-item list-group-item-danger">
                                          {{$error}}
                                    </li>
                              @endforeach
                        </ul>
                  @endif
            	<form method="POST" action="{{route('user.update',$user)}}">
            		{{ csrf_field() }} {{method_field('PUT')}}
            		    

                     @include('componentes.name',['model'=>$user])
            		
                     <div class="form-group">
            			   <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" value="{{old('email',$user->email)}}">
            		    </div>

                     <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" name="password">
                        <span class="help-block">Dejar en blanco si no quieres cambiar la contraseña</span>
                     </div>

                     <div class="form-group">
                           <label for="password_confirmation">Repita la contraseña:</label>
                           <input type="password" class="form-control" name="password_confirmation">
                     </div>
            		
                     <button class="btn btn-primary btn-flat btn-block" type="submit">Actualizar usuario</button>
            	</form>
            </div>
 		</div>
 	</div>
      <div class="col-md-6">
            <div class="card card-primary card-outline">
               <div class="card-header">
                 <h5 class="card-title">Roles: </h5>
               </div>
               @role('Admin')
               <div class="card-body">
                  <form method="POST" action="{{route('user.roles.update', $user)}}">
                  {{ csrf_field() }} {{method_field('PUT')}}
                  
                  @include('componentes.roles-checkboxes')

                  <button class="btn btn-primary btn-flat btn-block">Actualizar roles</button>
                  </form>
               </div>
               @else
               <ul class="list-group">
                  @forelse($user->roles as $role)
                     <li class="list-group-item">{{$role->name}}</li>
                  @empty
                     <li class="list-group-item">No tiene roles asignados.</li>
                  @endforelse
               </ul>
               @endrole
            </div>
      
            <div class="card card-primary card-outline">
               <div class="card-header">
                 <h5 class="card-title">Permisos: </h5>
               </div>
               @role('Admin')
               
               <div class="card-body">
                  <form method="POST" action="{{route('user.permissions.update', $user)}}">
                  {{ csrf_field() }} {{method_field('PUT')}}

                  @include('componentes.permissions-checkboxes',['model'=>$user])

                  <button class="btn btn-primary btn-flat btn-block">Actualizar permisos</button>
                  </form>
               </div>
               @else
               <ul class="list-group">
                  
                  @forelse($user->permissions as $permission)
                     <li class="list-group-item">{{$permission->name}}</li>
                  @empty
                     <li class="list-group-item">No tiene permisos asignados.</li>
                  @endforelse
                  
               </ul>
               @endrole
            </div>
      </div>      
 </div>
</div>    
</div></div>

@endsection