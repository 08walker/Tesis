<div class="form-group">
	<label for="exampleInputdate1">Fecha de llegada:</label>
	<input type="date" class="form-control" name="fyh_llegada" value="old('fyh_llegada',$model->fyh_llegada ? $model->fyh_llegada->format('d/m/y')):null">
  <div class="has-error">
      @if($errors->has('fyh_llegada'))
        <font color="#FF0000">
              <span style="background-color: inherit;">
                {{$errors->first('fyh_llegada')}}
              </span>
        </font>
      @endif
  </div>
 </div>