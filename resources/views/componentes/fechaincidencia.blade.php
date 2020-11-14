<div class="form-group">
	<label for="exampleInputdate11">Seleccione la fecha:</label>
	<input type="date" class="form-control" name="fyh_ini" value="old('fyh_ini',$model->fyh_ini ? $model->fyh_ini->format('d/m/y')):">
  <div class="has-error">
      @if($errors->has('fyh_ini'))
        <font color="#FF0000">
              <span style="background-color: inherit;">
                {{$errors->first('fyh_ini')}}
              </span>
        </font>
      @endif
  </div>
 </div>