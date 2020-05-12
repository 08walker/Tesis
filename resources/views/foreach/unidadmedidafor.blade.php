@if(isset($producto))
<div class="form-group">
    <label for="exampleInputEmail1">Unidad de medida:</label>
        <select class="form-control select2" style="width: 100%;" name="unidad_medida_id">
        @foreach($unidades as $unidad)
            @if($unidad->name == $producto->unidadMedida->name)
                <option value="{{$unidad->id}}" selected>{{$unidad->name}}</option>
            @else                                 
                <option value="{{$unidad->id}}">{{$unidad->name}}</option>
            @endif
        @endforeach
        </select>
</div>
@else
<div class="form-group">
    <label for="exampleInputEmail1">Unidad de medida:</label>
        <select class="form-control select2" style="width: 100%;" name="unidad_medida_id">
            <option value="">
                -----------------Seleccione la unidad de medida------------
            </option>
                @foreach($unidades as $unidad)
                    <option value="{{$unidad->id}}">
                        {{$unidad->name}}
                    </option>
                @endforeach
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
@endif