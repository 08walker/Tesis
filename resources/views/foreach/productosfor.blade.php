<div class="form-group">
    <label for="exampleInputEmail1">Seleccione el producto:</label>
        <select class="form-control select2" style="width: 100%;" name="producto_id">
            @if($model->producto_id)  
      
              @foreach($productos->all() as $producto)
                  @if($producto->id == $model->producto_id)
                      <option value="{{$producto->id}}">{{$producto->name}}</option>
                  @endif
              @endforeach
              
              @foreach($productos->all() as $producto)
                  @if($producto->id !== $model->producto_id)
                      <option value="{{$producto->id}}">{{$producto->name}}</option>
                  @endif
              @endforeach
              
              <option value="">
                -------Seleccione el producto------
              </option>
            @else
              <option value="">
                -------Seleccione el producto------
              </option>
              @foreach($productos->all() as $producto)
                  @if($producto->id == $model->producto_id)
                      <option value="{{$producto->id}}">{{$producto->name}}</option>
                  @else                                 
                      <option value="{{$producto->id}}">{{$producto->name}}</option>
                  @endif
              @endforeach
            @endif
        </select>
    <div class="has-error">
        @if($errors->has('producto_id'))
            <font color="#FF0000">
                    <span style="background-color: inherit;">
                        {{$errors->first('producto_id')}}
                    </span>
            </font>
        @endif
    </div>
</div>