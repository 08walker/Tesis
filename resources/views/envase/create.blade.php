@extends('admin.layout')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Crear envases</h1>
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
                    
                    <form role="form" id="quickForm" method="POST" action="{{ route('envases.create') }}">
                    {!! csrf_field() !!}
                    <div class="card-body">

                      <div class="row">
                        <div class="col-md-6">
                          @include('foreach.tercerofor',['model'=>$envase])
                        </div>
                        <div class="col-md-6">
                          @include('foreach.organizacionfor',['model'=>$envase])
                        </div>
                        <div class="col-md-6">
                          @include('componentes.identificador',['model'=>$envase])       
                        </div>
                        <div class="col-md-6">
                          @include('componentes.tara',['model'=>$envase])
                        </div>
                        <div class="col-md-6">
                          @include('componentes.volumen',['model'=>$envase])
                        </div>
                      </div>

                      <!-- es_propio 
                      <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="customCheckbox2" checked name="">
                          <label for="customCheckbox2" class="custom-control-label">Contratado:</label>
                        </div>                        
                      </div>
                      -->

                    <button type="submit" class="btn btn-success btn-flat">Crear</button>
                    <a class="btn btn-flat btn-primary" href="{{route('envases')}}">Cancelar</a>
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
      identificador: {
        required: true,
        minlength: 5,
      },
      volumen: {
        required: true,
        number:true,
        min: 0
      },
      tara: {
        required:true,
        number:true,
        min: 0
      },
      if ( organizacion_id == null ) {
        organizacion_id: {
        required:true
      },}
    },
    messages: {
      identificador: {
        required: "Debe introducir el identificador",
        minlength: "El identificador debe tener 5 caracteres como mínimo"
      },
      tara: {
        required: "Debe introducir la tara",
        number:"Debe introducir un número",
        min:"El valor debe ser mayor que 0"
      },
      volumen: {
        required: "Debe introducir el volumen",
        number:"Debe introducir un número",
        min:"El valor debe ser mayor que 0"
      },
      organizacion_id: {
        equalTo:"Please enter the same value again.",
      },
      tercero_id: {
       equalTo:"Please enter the same value again.",
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