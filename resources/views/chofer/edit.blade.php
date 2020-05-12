@extends('admin.layout')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Actualizar chofer</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
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
                    
                    <form method="POST" action="{{ route('choferes.update',$chofer) }}">
                    {{ method_field('PUT') }} {!! csrf_field() !!}
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nombre:</label>
                        <input autofocus="" type="text" class="form-control" name="name" id="exampleInputPassword1" placeholder="Escriba el nombre" value="{{$chofer->name,old('name')}}">
                      <div class="has-error">
                            @if($errors->has('name'))
                              <font color="#FF0000">
                                    <span style="background-color: inherit;">
                                      {{$errors->first('name')}}
                                    </span>
                              </font>
                            @endif
                      </div>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Apellido:</label>
                        <input type="text" class="form-control" name="apellido" id="exampleInputPassword1" placeholder="Escriba el apellido" value="{{$chofer->apellido, old('apellido')}}">
                      <div class="has-error">
                            @if($errors->has('apellido'))
                              <font color="#FF0000">
                                    <span style="background-color: inherit;">
                                      {{$errors->first('apellido')}}
                                    </span>
                              </font>
                            @endif
                      </div>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Carnet de identidad:</label>
                        <input type="text" class="form-control" name="ci" id="exampleInputPassword1" placeholder="Escriba el número de carnet" value="{{$chofer->ci, old('ci')}}">
                      <div class="has-error">
                            @if($errors->has('ci'))
                              <font color="#FF0000">
                                    <span style="background-color: inherit;">
                                      {{$errors->first('ci')}}
                                    </span>
                              </font>
                            @endif
                      </div>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Licencia:</label>
                        <input type="text" class="form-control" name="licencia" id="exampleInputPassword1" placeholder="Escriba código de la licencia" value="{{$chofer->licencia, old('licencia')}}">
                      <div class="has-error">
                            @if($errors->has('licencia'))
                              <font color="#FF0000">
                                    <span style="background-color: inherit;">
                                      {{$errors->first('licencia')}}
                                    </span>
                              </font>
                            @endif
                      </div>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Teléfono:</label>
                        <input type="text" class="form-control" name="telefono" id="exampleInputPassword1" placeholder="Escriba el número de teléfono" value="{{$chofer->telefono, old('telefono')}}">
                      <div class="has-error">
                            @if($errors->has('telefono'))
                              <font color="#FF0000">
                                    <span style="background-color: inherit;">
                                      {{$errors->first('telefono')}}
                                    </span>
                              </font>
                            @endif
                      </div>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Equipo:</label>
                        <select class="form-control select2" style="width: 100%;" name="equipo_id">
                            @foreach($equipos->all() as $equipo)
                                @if($equipo->id == $chofer->equipo_id)
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
                        <label for="exampleInputEmail1">Tercero:</label>
                        <select class="form-control select2" style="width: 100%;" name="tercero_id">
                            @foreach($terceros->all() as $tercero)
                                @if($tercero->id == $chofer->tercero_id)
                                  <option value="{{$tercero->id}}">{{$tercero->name}}</option>
                                @else                                 
                                  <option value="{{$tercero->id}}">{{$tercero->name}}</option>
                                @endif
                            @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Organización:</label>
                        <select class="form-control select2" style="width: 100%;" name="organizacion_id">
                            @foreach($organizaciones->all() as $org)
                                @if($org->id == $chofer->organizacion_id)
                                  <option value="{{$org->id}}">{{$org->name}}</option>
                                @else                                 
                                  <option value="{{$org->id}}">{{$org->name}}</option>
                                @endif
                            @endforeach
                        </select>
                      </div>

                    <button type="submit" class="btn btn-success btn-flat">Actualizar</button>
                    <a class="btn btn-flat btn-primary" href="{{route('choferes')}}">Cancelar</a>
                    </div>
                </form>                
                </div>
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