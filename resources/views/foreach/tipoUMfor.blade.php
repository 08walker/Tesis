<div class="form-group">
    <label for="exampleInputEmail1">Tipo de unidad de medida:</label>
    <select class="form-control select2" style="width: 100%;" name="tipo_unidad_medida_id">
        @if($model->tipo_unidad_medida_id)
          @foreach($tipoUnidades->all() as $unidad)
              @if($unidad->id == $model->tipo_unidad_medida_id)
                  <option value="{{$unidad->id}}">{{$unidad->name}}</option>
                  @else                                 
                  <option value="{{$unidad->id}}">{{$unidad->name}}</option>
                  @endif
          @endforeach
          <option value="">
            --------------------Seleccione la unidad----------------
          </option>
        @else 
          <option value="">
            --------------------Seleccione la unidad----------------
          </option>
          @foreach($tipoUnidades->all() as $unidad)
              @if($unidad->id == $model->tipo_unidad_medida_id)
                  <option value="{{$unidad->id}}">{{$unidad->name}}</option>
                  @else                                 
                  <option value="{{$unidad->id}}">{{$unidad->name}}</option>
                  @endif
          @endforeach
        @endif
    </select>
    <div class="has-error">
        @if($errors->has('tipo_unidad_medida_id'))
          <font color="#FF0000">
                <span style="background-color: inherit;">
                  {{$errors->first('tipo_unidad_medida_id')}}
                </span>
          </font>
        @endif
    </div>
</div>