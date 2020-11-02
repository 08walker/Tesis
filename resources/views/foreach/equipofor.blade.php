<div class="form-group">
    <label for="exampleInputEmail1">Equipo al que pertenece:</label>
        <select class="form-control select2" style="width: 100%;" name="equipo_id">
        @if($model->equipo_id)
      
          @foreach($equipos->all() as $equipo)
              @if($equipo->id == $model->equipo_id)
                <option value="{{$equipo->id}}">{{$equipo->identificador}}</option>
              @endif
          @endforeach
      
          @foreach($equipos->all() as $equipo)
              @if($equipo->id !== $model->equipo_id)
                <option value="{{$equipo->id}}">{{$equipo->identificador}}</option>
              @endif
          @endforeach
          
          <option value="">
            --------Seleccione el equipo--------
          </option>
        @else 
          <option value="">
            --------Seleccione el equipo--------
          </option>
          @foreach($equipos->all() as $equipo)
              @if($equipo->id == $model->equipo_id)
                <option value="{{$equipo->id}}">{{$equipo->identificador}}</option>
              @else                                 
                <option value="{{$equipo->id}}">{{$equipo->identificador}}</option>
              @endif
          @endforeach
        @endif
        </select>
    <div class="has-error">
        @if($errors->has('equipo_id'))
        <font color="#FF0000">
                <span style="background-color: inherit;">
                    {{$errors->first('equipo_id')}}
                </span>
        </font>
        @endif
    </div>
</div>