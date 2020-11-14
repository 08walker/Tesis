@extends('admin.layout')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Crear transportación</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    @include('partials.success')
    @include('partials.errors')

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
                    
                    <form id="quickForm" role="form" method="POST" action="{{ route('transportaciones.create') }}">
                    {!! csrf_field() !!}

                      @include('componentes.identificador',['model'=>$transportacion])
                      @include('componentes.observacion',['model'=>$transportacion])
                      @include('foreach.equipofor',['model'=>$transportacion])

                    <button type="submit" class="btn btn-success btn-flat">Crear</button>
                    <a class="btn btn-flat btn-primary" href="{{route('transportaciones')}}">Cancelar</a>
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
      equipo_id: {
        required: true
      },
    },
    messages: {
      identificador: {
        required: "Debe introducir el identificador",
        minlength: "El identificador debe tener 5 caracteres como mínimo"
      },
      equipo_id: {
        required: "Por favor seleccione el equipo",
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