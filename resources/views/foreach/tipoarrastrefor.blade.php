@if(isset($arrastre))
  <div class="form-group">
      <label for="exampleInputEmail1">Tipo de arrastre:</label>
        <select class="form-control select2" style="width: 100%;" name="tipo_arrastre_id">
            @foreach($tipoarrastre->all() as $tipo)
                @if($tipo->id == $arrastre->tipo_arrastre_id)
                    <option value="{{$tipo->id}}">
                        {{$tipo->name}}
                    </option>
                @else                                 
                    <option value="{{$tipo->id}}">{{$tipo->name}}</option>
                @endif
            @endforeach
        </select>
  </div>
@else
  <div class="form-group">
        <label for="exampleInputEmail1">Tipo de arrastre:</label>
          <select class="form-control select2" style="width: 100%;" name="tipo_arrastre_id">
                <option value="">
                    ----Seleccione el tipo de arrastre----
                </option>
                @foreach($tipoarrastre as $tipo)
                    <option value="{{$tipo->id}}">
                      {{$tipo->name}}
                    </option>
                @endforeach
          </select>
          <div class="has-error">
            @if($errors->has('tipo_arrastre_id'))
              <font color="#FF0000">
                  <span style="background-color: inherit;">
                    {{$errors->first('tipo_arrastre_id')}}
                  </span>
              </font>
            @endif
          </div>
  </div>
@endif