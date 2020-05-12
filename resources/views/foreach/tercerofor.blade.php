<div class="form-group">
    <label for="exampleInputEmail1">Tercero al que pertenece:</label>
        <select class="form-control select2" style="width: 100%;" name="tercero_id">
            <option value="">---------Seleccione el tercero--------
            </option>
             @foreach($terceros->all() as $tercero)
                <option value="{{$tercero->id}}">{{$tercero->name}}</option>
            @endforeach
        </select>
    <div class="has-error">
        @if($errors->has('tercero_id'))
        <font color="#FF0000">
                <span style="background-color: inherit;">
                    {{$errors->first('tercero_id')}}
                </span>
        </font>
        @endif
    </div>
</div>