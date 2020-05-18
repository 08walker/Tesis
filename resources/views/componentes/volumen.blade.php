<div class="form-group">
  <label for="exampleInputEmail1">Volumen de carga máxima:</label>
  <input type="number" min="0" max="100" step="1" class="form-control" name="volumen_max_carga" id="exampleInputVolumen1" placeholder="Escriba el volumen" value="{{$model->volumen_max_carga,old('volumen_max_carga')}}">
    <div class="has-error">
          @if($errors->has('volumen_max_carga'))
            <font color="#FF0000">
              <span style="background-color: inherit;">
                {{$errors->first('volumen_max_carga')}}
              </span>
            </font>
          @endif
    </div>
</div>