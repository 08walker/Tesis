<div class="form-group">
    <label for="exampleInputEmail1">Seleccione el chofer:</label>
      		<select class="form-control select2" style="width: 100%;" name="chofer_id">
          <option value="">
            --------Seleccione el chofer--------
          </option>
          @foreach($choferes->all() as $chofer)
                <option value="{{$chofer->id}}">{{$chofer->name}} {{$chofer->apellido}}</option>
          @endforeach
      </select>
      <div class="has-error">
        @if($errors->has('chofer_id'))
        <font color="#FF0000">
                <span style="background-color: inherit;">
                    {{$errors->first('chofer_id')}}
                </span>
        </font>
        @endif
    </div>
</div>