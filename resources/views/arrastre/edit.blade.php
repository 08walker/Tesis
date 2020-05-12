@extends('admin.layout')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Actualizar arrastre</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
          <div class="container">
            <div class="row">
                <!-- aling -->
                <div class="col-lg-3">
                  <div class="card"></div>
                </div>
                <div class="col-lg-6">
                <div class="card card-primary card-outline">
                  <div class="card-body">
                    @if($errors->any())
                    <div class="alert alert-danger">
                    <p>Por favor corrige los errores debajo:</p> 
                    </div>
                    @endif
                    
                    <form method="POST" action="{{ route('arrastres.update',$arrastre) }}">
                    {{ method_field('PUT') }} {!! csrf_field() !!}
                    <div class="card-body">

                      <div class="form-group">
                        <label for="exampleInputEmail1">Chapa:</label>
                        <input type="text" autofocus="" class="form-control" name="identificador" id="exampleInputPassword1" placeholder="Escriba el identificador" value="{{$arrastre->identificador, old('identificador')}}">
                          <div class="has-error">
                                @if($errors->has('identificador'))
                                  <font color="#FF0000">
                                    <span style="background-color: inherit;">
                                      {{$errors->first('identificador')}}
                                    </span>
                                  </font>
                                @endif
                          </div>
                      </div>
    
                      <div class="form-group">
                        <label for="exampleInputEmail1">Descripción:</label>
                        <input type="text" class="form-control" name="description" id="exampleInputPassword1" placeholder="Escriba la descripción" value="{{$arrastre->description, old('description')}}">
                          <div class="has-error">
                                @if($errors->has('description'))
                                <font color="#FF0000">
                                    <span style="background-color: inherit;">
                                      {{$errors->first('description')}}
                                    </span>
                                  </font>
                                @endif
                          </div>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Tara:</label>
                        <input type="text" class="form-control" name="tara" id="exampleInputPassword1" placeholder="Escriba la tara del arrastre" value="{{$arrastre->tara, old('tara')}}">
                      <div class="has-error">
                            @if($errors->has('tara'))
                                <font color="#FF0000">
                                    <span style="background-color: inherit;">
                                      {{$errors->first('tara')}}
                                    </span>
                                </font>
                            @endif
                      </div>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Volumen de carga máxima:</label>
                        <input type="text" class="form-control" name="volumen_max_carga" id="exampleInputPassword1" placeholder="Escriba el volumen" value="{{$arrastre->volumen_max_carga, old('volumen_max_carga')}}">
                          <div class="has-error">
                                @if($errors->has('volumen_max_carga'))
                                <font color="#FF0000">
                                    <span style="background-color: inherit;">
                                      {{$errors->first('volumen_max_carga')}}
                                    </span>
                                  </font>
                                @endif
                          </div>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Peso máximo que puede cargar:</label>
                        <input type="text" class="form-control" name="peso_max_carga" id="exampleInputPassword1" placeholder="Escriba el peso" value="{{$arrastre->peso_max_carga, old('peso_max_carga')}}">
                          <div class="has-error">
                                @if($errors->has('peso_max_carga'))
                                <font color="#FF0000">
                                    <span style="background-color: inherit;">
                                      {{$errors->first('peso_max_carga')}}
                                    </span>
                                  </font>
                                @endif
                          </div>
                      </div>

                    @include('foreach.tipoarrastrefor')
                        
                      <div class="form-group">
                        <label for="exampleInputEmail1">Equipo:</label>
                        <select class="form-control select2" style="width: 100%;" name="equipo_id">
                            @foreach($equipos->all() as $equipo)
                                @if($equipo->id == $arrastre->equipo_id)
                                  <option value="{{$equipo->id}}">{{$equipo->identificador}}</option>
                                @else                                 
                                  <option value="{{$equipo->id}}">{{$equipo->identificador}}</option>
                                @endif
                            @endforeach
                        </select>
                      </div>
                        
                     <!-- es_propio 
                      <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="customCheckbox2" checked name="">
                          <label for="customCheckbox2" class="custom-control-label">Contratado:</label>
                        </div>                        
                      </div>
                    -->

                      <div class="form-group">
                        <label for="exampleInputEmail1">Tercero al que pertenece:</label>
                        <select class="form-control select2" style="width: 100%;" name="tercero_id">
                            @if($arrastre->tercero_id)
                              @foreach($terceros->all() as $tercero)
                                  @if($tercero->id == $arrastre->tercero_id)
                                      <option value="{{$tercero->id}}">{{$tercero->name}}</option>
                                      @else                                 
                                      <option value="{{$tercero->id}}">{{$tercero->name}}</option>
                                      @endif
                              @endforeach
                              <option value="">
                                --------------------Seleccione el tercero----------------
                              </option>
                            @else 
                              <option value="">
                                --------------------Seleccione el tercero----------------
                              </option>
                              @foreach($terceros->all() as $tercero)
                                  @if($tercero->id == $arrastre->tercero_id)
                                      <option value="{{$tercero->id}}">{{$tercero->name}}</option>
                                      @else                                 
                                      <option value="{{$tercero->id}}">{{$tercero->name}}</option>
                                      @endif
                              @endforeach
                            @endif
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Organización a la que pertenece:</label>
                        <select class="form-control select2" style="width: 100%;" name="organizacion_id">
                            @if($arrastre->organizacion_id)  
                              @foreach($organizaciones->all() as $org)
                                  @if($org->id == $arrastre->organizacion_id)
                                      <option value="{{$org->id}}">{{$org->name}}</option>
                                      @else                                 
                                      <option value="{{$org->id}}">{{$org->name}}</option>
                                      @endif
                              @endforeach
                              <option value="">
                                --------------------Seleccione la organización----------------
                              </option>
                            @else
                              <option value="">
                                --------------------Seleccione la organización----------------
                              </option>
                              @foreach($organizaciones->all() as $org)
                                  @if($org->id == $arrastre->organizacion_id)
                                      <option value="{{$org->id}}">{{$org->name}}</option>
                                  @else                                 
                                      <option value="{{$org->id}}">{{$org->name}}</option>
                                  @endif
                              @endforeach
                            @endif
                      </select>
                      </div>

                    <button type="submit" class="btn btn-success btn-flat">Actualizar</button>
                    <a class="btn btn-flat btn-primary" href="{{route('arrastres')}}">Cancelar</a>
                    </div>
                </form>                
                </div>
                </div>
            </div>
            </div>
          </div>
</div>
@endsection

@push('styles')

<!-- Select2 -->
  <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

@endpush

@push('scripts')
  <!-- Select2 -->
  <script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>

<script>
    $(function () {

    //Initialize Select2 Elements
    $('.select2').select2({
      //tags:true
    });

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });

  });
</script>
@endpush