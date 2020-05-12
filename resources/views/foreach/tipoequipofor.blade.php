@if(isset($equipo))
<div class="form-group">
    <label for="exampleInputEmail1">Tipo de equipo:</label>
    <select class="form-control select2" style="width: 100%;" name="tipo_equipo_id">
        @foreach($tipoequipo->all() as $tipo)
            @if($tipo->id == $equipo->tipo_equipo_id)
                <option value="{{$tipo->id}}">{{$tipo->name}}</option>
            @else                                 
                <option value="{{$tipo->id}}">{{$tipo->name}}</option>
            @endif
        @endforeach
    </select>
</div>
@else
<div class="form-group">
    <label for="exampleInputEmail1">Tipo de equipo:</label>
        <select class="form-control select2" style="width: 100%;" name="tipo_equipo_id">
              <option value="">
                  ----Seleccione el tipo de equipo----
              </option>
              @foreach($tipoequipo as $tipo)
                  <option value="{{$tipo->id}}">
                    {{$tipo->name}}
                  </option>
              @endforeach
        </select>
  <div class="has-error">
      @if($errors->has('tipo_equipo_id'))
      <font color="#FF0000">
        <b>
          <span style="background-color: inherit;">
            {{$errors->first('tipo_equipo_id')}}
          </span>
        </b>
      </font>
      @endif
  </div>
</div>
@endif