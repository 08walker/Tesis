<div class="col-md-6">
    <div class="form-group">
        <label for="exampleInputEmail1">Organización a la que pertenece:</label>
            <select class="form-control select2" style="width: 100%;" name="organizacion_id">
                <option value="">-------Seleccione la organización-------
                </option>
                @foreach($organizaciones->all() as $org)
                    <option value="{{$org->id}}">{{$org->name}}</option>
                @endforeach
            </select>
        <div class="has-error">
            @if($errors->has('organizacion_id'))
                <font color="#FF0000">
                        <span style="background-color: inherit;">
                            {{$errors->first('organizacion_id')}}
                        </span>
                </font>
            @endif
        </div>
    </div>
</div>