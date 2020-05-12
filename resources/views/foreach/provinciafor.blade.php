@if(isset($municipio))
    <div class="form-group">
        <label for="exampleInputEmail1">Provincia:</label>
            <select class="form-control select2" style="width: 100%;" name="provincia_id">
                @foreach($provincias as $provincia)
                    @if($provincia->name == $municipio->provincia->name)
                        <option value="{{$provincia->id}}" selected>
                            {{$provincia->name}}
                        </option>
                    @else                                 
                        <option value="{{$provincia->id}}">{{$provincia->name}}</option>
                    @endif
                @endforeach
            </select>
    </div>
@else
        <div class="form-group">
            <label for="exampleInputEmail1">Provincia:</label>
            <select class="form-control select2" id="provincia_id" style="width: 100%;" name="provincia_id">
                <option value="">
                    --------------------Seleccione la provincia--------------------
                </option>
                @foreach($provincias as $provincia)
                    <option value="{{$provincia->id}}">
                        {{$provincia->name}}
                    </option>
                @endforeach
            </select>
            <div class="has-error">
                @if($errors->has('name'))
                    <font color="#FF0000">
                            <span style="background-color: inherit;">
                                {{$errors->first('provincia_id')}}
                            </span>
                    </font>
                @endif
            </div>
        </div>
@endif