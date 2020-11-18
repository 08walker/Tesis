@extends('admin.layout')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Crear organización</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    @include('partials.success')

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
                    
                    @include('partials.error-messages')
                    
                    <form id="quickForm" role="form" method="POST" action="{{ route('organizaciones.create') }}">
                    {!! csrf_field() !!}
                    <div class="card-body">
                      
                        @include('componentes.name',['model'=>$organizacion])
                        @include('componentes.identificador',['model'=>$organizacion])
                        @include('foreach.municipiofor',['model'=>$organizacion])

                    <button type="submit" class="btn btn-success btn-flat">Crear</button>
                    <a class="btn btn-flat btn-primary" href="{{route('organizaciones')}}">Cancelar</a>
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
        minlength: 5,
      },
      identificador: {
        required: true,
        minlength: 5,
      },
      municipio_id: {
        required: true
      },
    },
    messages: {
      name: {
        required: "Debe introducir el nombre",
        minlength: "El nombre debe tener 5 caracteres como mínimo"
      },
      identificador: {
        required: "Debe introducir el identificador",
        minlength: "El identificador debe tener 5 caracteres como mínimo"
      },
      municipio_id: {
        required: "Por favor seleccione el municipio",
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