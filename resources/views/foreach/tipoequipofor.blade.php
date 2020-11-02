<div class="form-group">
    <label for="exampleInputEmail1">Tipo de equipo:</label>
        <select class="form-control select2" style="width: 100%;" name="tipo_equipo_id">
        @if($model->tipo_equipo_id)

          @foreach($tipoequipo->all() as $tipo)
              @if($tipo->id == $model->tipo_equipo_id)
                <option value="{{$tipo->id}}">{{$tipo->name}}</option>
              @endif
          @endforeach

          @foreach($tipoequipo->all() as $tipo)
              @if($tipo->id !== $model->tipo_equipo_id)
                <option value="{{$tipo->id}}">{{$tipo->name}}</option>
              @endif
          @endforeach
          
          <option value="">
            ----Seleccione el tipo de equipo----
          </option>
        @else 
          <option value="">
            ----Seleccione el tipo de equipo----
          </option>
          @foreach($tipoequipo->all() as $tipo)
              @if($tipo->id == $model->tipo_equipo_id)
                <option value="{{$tipo->id}}">{{$tipo->name}}</option>
              @else                                 
                <option value="{{$tipo->id}}">{{$tipo->name}}</option>
              @endif
          @endforeach
        @endif
        </select>
    <div class="has-error">
        @if($errors->has('tipo_equipo_id'))
        <font color="#FF0000">
                <span style="background-color: inherit;">
                    {{$errors->first('tipo_equipo_id')}}
                </span>
        </font>
        @endif
    </div>
</div>