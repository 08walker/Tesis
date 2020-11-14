<div class="form-group">
  <label for="exampleInputEmail1">Número de la trasnportación:</label>
  <input type="text" autofocus="" class="form-control" name="numero" id="exampleInputIdentificador1" placeholder="Escriba el número de la factura" value="{{$model->numero,old('numero')}}">
  <div class="has-error">
      @if($errors->has('numero'))
        <font color="#FF0000">
              <span style="background-color: inherit;">
                {{$errors->first('numero')}}
              </span>
        </font>
      @endif
  </div>
</div>