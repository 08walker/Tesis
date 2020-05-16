<div class="form-group">
  <label>Descripción:</label>
    <textarea class="form-control" name="description" rows="2" placeholder="Escriba la descripción">{{$model->description}}</textarea>
    <div class="has-error">
          @if($errors->has('description'))
            <font color="#FF0000">
              <span style="background-color: inherit;">
                {{$errors->first('description')}}
              </span>
            </font>
          @endif
    </div>
</div>