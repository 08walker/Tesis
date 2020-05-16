<div class="form-group">
    <label for="exampleInputEmail1">Unidad de medida:</label>
        <select class="form-control select2" style="width: 100%;" name="unidad_medida_id">
        @if($model->unidad_medida_id)
          @foreach($unidades->all() as $unidad)
              @if($unidad->id == $model->unidad_medida_id)
                <option value="{{$unidad->id}}">{{$unidad->name}}</option>
              @else                                 
                <option value="{{$unidad->id}}">{{$unidad->name}}</option>
              @endif
          @endforeach
          <option value="">
            -----------------Seleccione la unidad de medida------------
          </option>
        @else 
          <option value="">
            -----------------Seleccione la unidad de medida------------
          </option>
          @foreach($unidades->all() as $unidad)
              @if($unidad->id == $model->unidad_medida_id)
                <option value="{{$unidad->id}}">{{$unidad->name}}</option>
              @else                                 
                <option value="{{$unidad->id}}">{{$unidad->name}}</option>
              @endif
          @endforeach
        @endif
        </select>
    <div class="has-error">
        @if($errors->has('unidad_medida_id'))
        <font color="#FF0000">
                <span style="background-color: inherit;">
                    {{$errors->first('unidad_medida_id')}}
                </span>
        </font>
        @endif
    </div>
</div>