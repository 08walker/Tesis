<div class="form-group">
    <label for="exampleInputMunicipio1">Municipio al que pertenece:</label>
        <select class="form-control select2" style="width: 100%;" name="municipio_id">
            <option value="">------Seleccione el municipio------
            </option>
            @foreach($municipios as $municipio)
              <option value="{{$municipio->id}}">
                {{$municipio->name}}
              </option>
            @endforeach
        </select>
    <div class="has-error">
        @if($errors->has('municipio_id'))
            <font color="#FF0000">
                <span style="background-color: inherit;">
                    {{$errors->first('municipio_id')}}
                </span>
            </font>
        @endif
    </div>
</div>