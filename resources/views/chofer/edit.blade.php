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
                <div class="col-lg-2">
                  <div class="card"></div>
                </div>
                <div class="col-lg-8">
                <div class="card card-primary card-outline">
                  <div class="card-body">
                    
                    @include('partials.error-messages')
                    
                    <form id="quickForm" role="form" method="POST" action="{{ route('choferes.update',$chofer) }}">
                    {{ method_field('PUT') }} {!! csrf_field() !!}
                    <div class="card-body">
                      <div class="row">
                         <div class="col-md-6">
                            @include('foreach.tercerofor',['model'=>$chofer])
                         </div>
                         <div class="col-md-6">
                            @include('foreach.organizacionfor',['model'=>$chofer])
                         </div>
                         <div class="col-md-6">
                            @include('componentes.name',['model'=>$chofer])
                         </div>                        

                      <div class="col-md-6 form-group">
                        <label for="exampleInputApellido1">Apellidos:</label>
                        <input type="text" class="form-control" name="apellido" id="exampleInputPassword1" placeholder="Escriba el apellido" value="{{$chofer->apellido,old('apellido')}}">
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

                      <div class="col-md-6 form-group">
                        <label for="exampleInputCi1">Carnet de identidad:</label>
                        <input type="text" class="form-control" name="ci" id="exampleInputCi1" placeholder="Escriba el número de carnet" value="{{$chofer->ci,old('ci')}}">
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

                      <div class="col-md-6 form-group">
                        <label for="exampleInputEmail1">Licencia:</label>
                        <input type="text" class="form-control" name="licencia" id="exampleInputLicencia1" placeholder="Escriba código de la licencia" value="{{$chofer->licencia, old('licencia')}}">
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

                      <div class="col-md-6 form-group">
                        <label for="exampleInputEmail1">Teléfono:</label>
                        <input type="text" class="form-control" name="telefono" id="exampleInputTelefono1" placeholder="Escriba el número de teléfono" value="{{$chofer->telefono, old('telefono')}}">
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
                      
                      <div class="col-md-6">
                        @include('foreach.equipofor',['model'=>$chofer])
                      </div>
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
  <!-- jquery-validation -->
  <script src="/adminlte/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="/adminlte/plugins/jquery-validation/additional-methods.min.js"></script>

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

<script type="text/javascript">
$(document).ready(function () {
  $('#quickForm').validate({
    rules: {
      name: {
        required: true,
        minlength:2
      },
      ci: {
        required: true,
        minlength:10,
        maxlength:12
      },
      licencia: {
        required: true
      },
      equipo_id: {
        required: true
      },
      telefono: {
        required: true,
        //number:true
      },
    },
    messages: {
      name: {
        required: "Debe introducir el nombre",
        maxlength: "El nombre debo terner mas caracteres",
      },
      ci: {
        required: "Debe introducir el carnet de identidad",
        minlength: "El carnet debe tener 11 dígitos",
        maxlength: "El carnet debe tener 11 dígitos",
      },
      licencia: {
        required: "Debe introducir el código de la licencia",
      },
      equipo_id: {
        required: "Debe seleccionar el equipo",
      },
      telefono: {
        required: "Debe introducir el número de teléfono",
        //number: "Solo debe introducir números",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
@endpush