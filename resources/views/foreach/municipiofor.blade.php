<div class="form-group">
    <label for="exampleInputEmail1">Municipio al que pertenece:</label>
        <select class="form-control select2" style="width: 100%;" name="municipio_id">
        @if($model->municipio_id)
          
          @foreach($municipios->all() as $municipio)
              @if($municipio->id == $model->municipio_id)
                <option value="{{$municipio->id}}">{{$municipio->name}}</option>
              @endif
          @endforeach

          @foreach($municipios->all() as $municipio)
              @if($municipio->id !== $model->municipio_id)
                <option value="{{$municipio->id}}">{{$municipio->name}}</option>
              @endif
          @endforeach
      
          <option value="">
            ------Seleccione el municipio------
          </option>
        @else 
          <option value="">
            ------Seleccione el municipio------
          </option>
          @foreach($municipios->all() as $municipio)
              @if($municipio->id == $model->municipio_id)
                <option value="{{$municipio->id}}">{{$municipio->name}}</option>
              @else                                 
                <option value="{{$municipio->id}}">{{$municipio->name}}</option>
              @endif
          @endforeach
        @endif
        </select>
    <div class="has-error">
        @if($errors->has('municipio_id'))
        <font color="#FF0000">
                <span style="background-color: inherit;">
                    {{$errors->first('municipio_id')}}
                </span>
        </font>
        @endif
    </div>
</div>