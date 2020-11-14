<div class="form-group">
    <label for="exampleInputEmail1">Selecciones el tipo de incidencia:</label>
        <select class="form-control select2" style="width: 100%;" name="tipo_hito_id">
            @if($model->tipo_hito_id)  
      
              @foreach($thitos->all() as $hito)
                  @if($hito->id == $model->tipo_hito_id)
                      <option value="{{$hito->id}}">{{$hito->name}}</option>
                  @endif
              @endforeach
              
              @foreach($thitos->all() as $hito)
                  @if($hito->id !== $model->tipo_hito_id)
                      <option value="{{$hito->id}}">{{$hito->name}}</option>
                  @endif
              @endforeach
              
              <option value="">
                -------Seleccione el tipo de incidencia------
              </option>
            @else
              <option value="">
                -------Seleccione el tipo de incidencia------
              </option>
              @foreach($thitos->all() as $hito)
                  @if($hito->id == $model->tipo_hito_id)
                      <option value="{{$hito->id}}">{{$hito->name}}</option>
                  @else                                 
                      <option value="{{$hito->id}}">{{$hito->name}}</option>
                  @endif
              @endforeach
            @endif
        </select>
    <div class="has-error">
        @if($errors->has('tipo_hito_id'))
            <font color="#FF0000">
                    <span style="background-color: inherit;">
                        {{$errors->first('tipo_hito_id')}}
                    </span>
            </font>
        @endif
    </div>
</div>