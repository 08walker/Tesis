<div class="form-group">
    <label for="exampleInputEmail1">Seleccione el envase:</label>
      		<select class="form-control select2" style="width: 100%;" name="envase_id">
          <option value="">
            --------Seleccione el envase--------
          </option>
          @foreach($envases->all() as $envase)
                <option value="{{$envase->id}}">{{$envase->identificador}}</option>
          @endforeach
      </select>
      <div class="has-error">
        @if($errors->has('envase_id'))
        <font color="#FF0000">
                <span style="background-color: inherit;">
                    {{$errors->first('envase_id')}}
                </span>
        </font>
        @endif
    </div>
</div>