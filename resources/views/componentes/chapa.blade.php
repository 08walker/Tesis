<div class="form-group">
	<label for="exampleInputEmail1">Chapa:</label>
	<input type="text" autofocus="" class="form-control" name="identificador" id="exampleInputidentificador1" placeholder="Escriba el identificador" value="{{$model->identificador,old('identificador')}}">
  <div class="has-error">
        @if($errors->has('identificador'))
	        <span id="helpBlock2" class="help-block">
	        	{{$errors->first('identificador')}}
	        </span>
        @endif
  </div>
</div>