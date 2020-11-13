@extends('admin.layout')

@section('content')

		'cantidad_bultos',
        'transf_enviada_id',
        'equipo_arrastre_envase_id',
<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Introducir productos</h1>
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
                    
                    <form id="quickForm" role="form" method="POST" action="{{ route('municipios.create') }}">
                    {!! csrf_field() !!}
                    <div class="card-body">
                      
                      @include('foreach.productosfor',['model'=>$transfer])
        
                      @include('componentes.observacion',['model'=>$transfer])

                      @include('componentes.pesoprod',['model'=>$transfer])

                      @include('componentes.volumenprod',['model'=>$transfer])

                    <button type="submit" class="btn btn-success btn-flat">Añadir</button>
                    <a class="btn btn-flat btn-primary" href="{{route('municipios')}}">Cancelar</a>
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
      producto_id: {
        required: true
      },
      peso_kg: {
        required: true,
        number: true
      },
      volumen_m3: {
        required: true,
        number: true
      },
    },
    messages: {
      producto_id: {
        required: "Debe seleccionar un producto"
      },
      peso_kg: {
        required: "Debe introducir el peso",
        number: "Debe introducir un número"
      },
      volumen_m3: {
        required: "Por favor seleccione la provincia",
        number: "Debe introducir un número"
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