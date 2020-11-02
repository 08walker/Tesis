<div class="form-group">
    <label for="exampleInputEmail1">Provincia:</label>
    <select class="form-control select2" style="width: 100%;" name="provincia_id">
        @if($model->provincia_id)
          @foreach($provincias->all() as $provincia)
              @if($provincia->id == $model->provincia_id)
                  <option value="{{$provincia->id}}">{{$provincia->name}}</option>
              @endif
          @endforeach

          @foreach($provincias->all() as $provincia)
              @if($provincia->id !== $model->provincia_id)
                  <option value="{{$provincia->id}}">{{$provincia->name}}</option>
              @endif
          @endforeach

          <option value="">
            --------------------Seleccione el provincia----------------
          </option>
        @else 
          <option value="">
            --------------------Seleccione el provincia----------------
          </option>
      
          @foreach($provincias->all() as $provincia)
              @if($provincia->id == $model->provincia_id)
                  <option value="{{$provincia->id}}">{{$provincia->name}}</option>
                  @else                                 
                  <option value="{{$provincia->id}}">{{$provincia->name}}</option>
                  @endif
          @endforeach
        @endif
    </select>
    <div class="has-error">
        @if($errors->has('provincia_id'))
          <font color="#FF0000">
                <span style="background-color: inherit;">
                  {{$errors->first('provincia_id')}}
                </span>
          </font>
        @endif
    </div>
</div>