<div class="form-group">
	<label for="exampleInputdate11">Fecha de salida:</label>
	<input type="date" class="form-control" name="fyh_salida" value="old('fyh_salida',$model->fyh_salida ? $model->fyh_salida->format('d/m/y')):">
  <div class="has-error">
      @if($errors->has('fyh_salida'))
        <font color="#FF0000">
              <span style="background-color: inherit;">
                {{$errors->first('fyh_salida')}}
              </span>
        </font>
      @endif
  </div>
 </div>