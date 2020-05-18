<div class="form-group">
  <label for="exampleInputEmail1">Peso máximo que puede cargar:</label>
  <input type="number" min="0" max="100" step="1" class="form-control" name="peso_max_carga" id="exampleInputPeso1" placeholder="Escriba el peso" value="{{$model->peso_max_carga,old('peso_max_carga')}}">
    <div class="has-error">
          @if($errors->has('peso_max_carga'))
            <font color="#FF0000">
              <span style="background-color: inherit;">
                {{$errors->first('peso_max_carga')}}
              </span>
            </font>
          @endif
    </div>
</div>