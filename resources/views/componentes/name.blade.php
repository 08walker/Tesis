<div class="form-group">
	<label for="exampleInputName1">Nombre:</label>
	<input autofocus="" type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Escriba el nombre" value="{{old('name')}}">
	<div class="has-error">
	    @if($errors->has('name'))
	      <font color="#FF0000">
	            <span style="background-color: inherit;">
	              {{$errors->first('name')}}
	            </span>
	      </font>
	    @endif
	</div>
</div>