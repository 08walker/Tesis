<div class="form-group">
    <label for="exampleInputTipoA1">Tipo de arrastre:</label>
        <select class="form-control select2" id="exampleTipoA1" style="width: 100%;" name="tipo_arrastre_id">
        @if($model->tipo_arrastre_id)

          @foreach($tipoarrastre->all() as $tipo)
              @if($tipo->id == $model->tipo_arrastre_id)
                  <option value="{{$tipo->id}}">{{$tipo->name}}</option>
              @endif
          @endforeach

          @foreach($tipoarrastre->all() as $tipo)
              @if($tipo->id !== $model->tipo_arrastre_id)
                  <option value="{{$tipo->id}}">{{$tipo->name}}</option>
              @endif
          @endforeach
      
          <option value="">
            ----Seleccione el tipo de arrastre----
          </option>
        @else 
          <option value="">
            ----Seleccione el tipo de arrastre----
          </option>
          @foreach($tipoarrastre->all() as $tipo)
              @if($tipo->id == $model->tipo_arrastre_id)
                  <option value="{{$tipo->id}}">{{$tipo->name}}</option>
                  @else                                 
                  <option value="{{$tipo->id}}">{{$tipo->name}}</option>
              @endif
          @endforeach
        @endif
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