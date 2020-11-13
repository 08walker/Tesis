<div class="form-group">
  <label for="exampleInputEmail1">Escriba el volúmen:</label>
  <input type="number" min="0" max="100" step="1" class="form-control" name="volumen_m3" id="exampleInputVolumen1" placeholder="Escriba el volumen" value="{{$model->volumen_m3,old('volumen_m3')}}">
    <div class="has-error">
          @if($errors->has('volumen_m3'))
            <font color="#FF0000">
              <span style="background-color: inherit;">
                {{$errors->first('volumen_m3')}}
              </span>
            </font>
          @endif
    </div>
</div>