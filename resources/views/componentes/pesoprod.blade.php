<div class="form-group">
  <label for="exampleInputEmail1">Escriba el peso del producto:</label>
  <input type="number" min="0" max="100" step="1" class="form-control" name="peso_kg" id="exampleInputPeso1" placeholder="Escriba el peso" value="{{$model->peso_kg,old('peso_kg')}}">
    <div class="has-error">
          @if($errors->has('peso_kg'))
            <font color="#FF0000">
              <span style="background-color: inherit;">
                {{$errors->first('peso_kg')}}
              </span>
            </font>
          @endif
    </div>
</div>