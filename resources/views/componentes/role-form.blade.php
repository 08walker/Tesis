{{ csrf_field() }}
      
      <div class="form-group">
			   <label for="name">Nombre:</label>
         @if($role->exists)
           <input class="form-control" value="{{$role->name}}" disabled="">
         @else
           <input autofocus="" type="text" class="form-control" name="name" placeholder="Escriba el nombre" value="{{old('name')}}">
          <div class="has-error">
              @if($errors->has('name'))
                <font color="#FF0000">
                      <span style="background-color: inherit;">
                        {{$errors->first('name')}}
                      </span>
                </font>
              @endif
          </div>
         @endif
			</div>

			{{-- <div class="form-group">
			<label for="guard_name">Guard:</label>
                  <select class="form-control select2" style="width: 100%;" name="guard_name">
                    @foreach(config('auth.guards') as $guardName => $guard)
                    <option {{ old('guard_name') === $guardName ? 'selected': ''}}
                    value="{{$guardName}}">
                    	{{$guardName}}
                    </option>
                    @endforeach
                  </select>
			</div> --}}

			<div class="row">
			<div class="form-group col-md-6">
				<label for="">Permisos:</label>
		        @include('componentes.permissions-checkboxes',['model'=>$role])
			</div>
			</div>