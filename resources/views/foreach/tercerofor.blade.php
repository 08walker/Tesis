<div class="form-group">
    <label for="exampleInputEmail1">Tercero al que pertenece:</label>
        <select class="form-control select2" style="width: 100%;" name="tercero_id">
        @if($model->tercero_id)
          @foreach($terceros->all() as $tercero)
              @if($tercero->id == $model->tercero_id)
                <option value="{{$tercero->id}}">{{$tercero->name}}</option>
              @else                                 
                <option value="{{$tercero->id}}">{{$tercero->name}}</option>
              @endif
          @endforeach
          <option value="">
            -----------Seleccione el tercero-------
          </option>
        @else 
          <option value="">
            -----------Seleccione el tercero-------
          </option>
          @foreach($terceros->all() as $tercero)
              @if($tercero->id == $model->tercero_id)
                <option value="{{$tercero->id}}">{{$tercero->name}}</option>
              @else                                 
                <option value="{{$tercero->id}}">{{$tercero->name}}</option>
              @endif
          @endforeach
        @endif
        </select>
    <div class="has-error">
        @if($errors->has('tercero_id'))
        <font color="#FF0000">
                <span style="background-color: inherit;">
                    {{$errors->first('tercero_id')}}
                </span>
        </font>
        @endif
    </div>
</div>