<div class="form-group">
    <label for="exampleInputEmail1">Selecciones el Destino:</label>
        <select class="form-control select2" style="width: 100%;" name="destino_id">
            @if($model->destino_id)  
      
              @foreach($lugares->all() as $lugar)
                  @if($lugar->id == $model->destino_id)
                      <option value="{{$lugar->id}}">{{$lugar->name}}</option>
                  @endif
              @endforeach
              
              @foreach($lugares->all() as $lugar)
                  @if($lugar->id !== $model->destino_id)
                      <option value="{{$lugar->id}}">{{$lugar->name}}</option>
                  @endif
              @endforeach
              
              <option value="">
                -------Seleccione el destino------
              </option>
            @else
              <option value="">
                -------Seleccione el destino------
              </option>
              @foreach($lugares->all() as $lugar)
                  @if($lugar->id == $model->destino_id)
                      <option value="{{$lugar->id}}">{{$lugar->name}}</option>
                  @else                                 
                      <option value="{{$lugar->id}}">{{$lugar->name}}</option>
                  @endif
              @endforeach
            @endif
        </select>
    <div class="has-error">
        @if($errors->has('destino_id'))
            <font color="#FF0000">
                    <span style="background-color: inherit;">
                        {{$errors->first('destino_id')}}
                    </span>
            </font>
        @endif
    </div>
</div>