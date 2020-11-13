<div class="form-group">
    <label for="exampleInputEmail1">Selecciones el Origen:</label>
        <select class="form-control select2" style="width: 100%;" name="origen_id">
            @if($model->origen_id)  
      
              @foreach($lugares->all() as $lugar)
                  @if($lugar->id == $model->origen_id)
                      <option value="{{$lugar->id}}">{{$lugar->name}}</option>
                  @endif
              @endforeach
              
              @foreach($lugares->all() as $lugar)
                  @if($lugar->id !== $model->origen_id)
                      <option value="{{$lugar->id}}">{{$lugar->name}}</option>
                  @endif
              @endforeach
              
              <option value="">
                -------Seleccione el origen------
              </option>
            @else
              <option value="">
                -------Seleccione el origen------
              </option>
              @foreach($lugares->all() as $lugar)
                  @if($lugar->id == $model->origen_id)
                      <option value="{{$lugar->id}}">{{$lugar->name}}</option>
                  @else                                 
                      <option value="{{$lugar->id}}">{{$lugar->name}}</option>
                  @endif
              @endforeach
            @endif
        </select>
    <div class="has-error">
        @if($errors->has('origen_id'))
            <font color="#FF0000">
                    <span style="background-color: inherit;">
                        {{$errors->first('origen_id')}}
                    </span>
            </font>
        @endif
    </div>
</div>