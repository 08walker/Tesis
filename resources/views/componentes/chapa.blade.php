<div class="form-group">
	<label for="exampleInputChapa1">Chapa:</label>
	<input type="text" autofocus="" class="form-control" name="identificador" id="exampleChapa1" placeholder="Escriba el identificador" value="{{$model->identificador,old('identificador')}}">
  <div class="has-error">
      @if($errors->has('identificador'))
        <font color="#FF0000">
              <span style="background-color: inherit;">
                {{$errors->first('identificador')}}
              </span>
        </font>
      @endif
  </div>
 </div>