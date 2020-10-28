{{ csrf_field() }}
      <div class="form-group">
			   <label for="name">Identificador:</label>
         @if($role->exists)
           <input class="form-control" value="{{$role->name}}" disabled="">
         @else
           <input type="text" class="form-control" name="name" value="{{old('name')}}">  
         @endif
			</div>

      <div class="form-group">
         <label for="display_name">Nombre:</label>
         <input type="text" autofocus="" class="form-control" name="display_name" value="{{old('display_name',$role->display_name)}}">
      </div>

			<div class="form-group">
			<label for="guard_name">Guard:</label>
                  <select class="form-control select2" style="width: 100%;" name="guard_name">
                    @foreach(config('auth.guards') as $guardName => $guard)
                    <option {{ old('guard_name') === $guardName ? 'selected': ''}}
                    value="{{$guardName}}">
                    	{{$guardName}}
                    </option>
                    @endforeach
                  </select>
			</div>

			<div class="row">
			<div class="form-group col-md-6">
				<label for="">Permisos:</label>
		        @include('admin.partials.permissions-checkboxes',['model'=>$role])
			</div>
			</div>