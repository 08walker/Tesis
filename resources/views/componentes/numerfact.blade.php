<div class="form-group">
  <label for="exampleInputEmail1">Número de Factura:</label>
  <input type="text" autofocus="" class="form-control" name="num_fact" id="exampleInputIdentificador1" placeholder="Escriba el número de la factura" value="{{$model->num_fact,old('num_fact')}}">
  <div class="has-error">
      @if($errors->has('num_fact'))
        <font color="#FF0000">
              <span style="background-color: inherit;">
                {{$errors->first('num_fact')}}
              </span>
        </font>
      @endif
  </div>
</div>