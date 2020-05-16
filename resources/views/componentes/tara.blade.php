<div class="form-group">
	<label for="exampleInputEmail1">Tara:</label>
	<input type="text" class="form-control" name="tara" id="exampleInputTara1" placeholder="Escriba la tara del arrastre" value="{{$model->tara,old('tara')}}">
	<div class="has-error">
	      @if($errors->has('tara'))
	        <font color="#FF0000">
	              <span style="background-color: inherit;">
	                {{$errors->first('tara')}}
	              </span>
	        </font>
	      @endif
	</div>
</div>