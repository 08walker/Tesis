<div class="col-md-6 form-group">
    <label for="exampleInputEquipoId1">Equipo por defecto:</label>
    	<select class="form-control select2" style="width: 100%;" name="equipo_id">
            <option value="">
            	--------Seleccione el equipo--------
            </option>
            @foreach($equipos as $equipos)
            	<option value="{{$equipos->id}}">
            		{{$equipos->identificador}}
                </option>
            @endforeach
        </select>
    <div class="has-error">
    	@if($errors->has('equipo_id'))
        <font color="#FF0000"><b><span style="background-color: inherit;">{{$errors->first('equipo_id')}}</span></b></font>
        @endif
	</div>
</div>