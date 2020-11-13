@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Crear Tranferencia</h1>
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
                
                @include('partials.error-messages')
                
                <form id="quickForm" role="form" method="POST" action="{{ route('tenv.create') }}">
                {!! csrf_field() !!}
                <div class="card-body">
                  
    		        @include('componentes.fechasalida',['model'=>$transfer])

    		        @include('componentes.numerfact',['model'=>$transfer])

    		        @include('foreach.origenfor',['model'=>$transfer])

    		        @include('foreach.destinofor',['model'=>$transfer])

                <button type="submit" class="btn btn-success btn-flat">Crear</button>
                <a class="btn btn-flat btn-primary" href="{{route('tenv')}}">Cancelar</a>

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
      num_fact: {
        required: true
      },
      origen_id: {
        required: true
      },
      destino_id: {
        required: true
      },
      fyh_salida: {
        required: true
      },
      
    },
    messages: {
      fyh_salida: {
        required: "Debe seleccionar una fecha"
      },
      num_fact: {
        required: "Debe introducir el número de la factura"
      },
      origen_id: {
        required: "Debe seleccionar un destino"
      },
      destino_id: {
        required: "Debe seleccionar un destino"
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