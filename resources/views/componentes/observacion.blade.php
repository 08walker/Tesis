<div class="form-group">
  <label>Observación:</label>
    <textarea class="form-control" name="observacion" rows="2" placeholder="Escriba la observación">{{$model->observacion}}</textarea>
    <div class="has-error">
          @if($errors->has('observacion'))
            <font color="#FF0000">
              <span style="background-color: inherit;">
                {{$errors->first('observacion')}}
              </span>
            </font>
          @endif
    </div>
</div>