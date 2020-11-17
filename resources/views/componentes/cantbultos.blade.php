<div class="form-group">
  <label for="exampleInputEmail1">Escriba la cantidad de bultos:</label>
  <input type="number" min="0" max="100" step="1" class="form-control" name="cantidad_bultos" id="exampleInputPeso1" placeholder="Escriba la cantidad de bultos" value="{{$model->cantidad_bultos,old('cantidad_bultos')}}">
    <div class="has-error">
          @if($errors->has('cantidad_bultos'))
            <font color="#FF0000">
              <span style="background-color: inherit;">
                {{$errors->first('cantidad_bultos')}}
              </span>
            </font>
          @endif
    </div>
</div>