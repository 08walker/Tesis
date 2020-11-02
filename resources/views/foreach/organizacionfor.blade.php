<div class="form-group">
    <label for="exampleInputEmail1">Organización a la que pertenece:</label>
        <select class="form-control select2" style="width: 100%;" name="organizacion_id">
            @if($model->organizacion_id)  
      
              @foreach($organizaciones->all() as $org)
                  @if($org->id == $model->organizacion_id)
                      <option value="{{$org->id}}">{{$org->name}}</option>
                  @endif
              @endforeach
              
              @foreach($organizaciones->all() as $org)
                  @if($org->id !== $model->organizacion_id)
                      <option value="{{$org->id}}">{{$org->name}}</option>
                  @endif
              @endforeach
              
              <option value="">
                -------Seleccione la organización------
              </option>
            @else
              <option value="">
                -------Seleccione la organización------
              </option>
              @foreach($organizaciones->all() as $org)
                  @if($org->id == $model->organizacion_id)
                      <option value="{{$org->id}}">{{$org->name}}</option>
                  @else                                 
                      <option value="{{$org->id}}">{{$org->name}}</option>
                  @endif
              @endforeach
            @endif
        </select>
    <div class="has-error">
        @if($errors->has('organizacion_id'))
            <font color="#FF0000">
                    <span style="background-color: inherit;">
                        {{$errors->first('organizacion_id')}}
                    </span>
            </font>
        @endif
    </div>
</div>