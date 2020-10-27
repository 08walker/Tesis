@extends('admin.layout')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Crear provincia</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        <!-- Main content -->
        <div class="content">
          <div class="container">
            <div class="row">
    
                <!-- aling -->
                <div class="col-lg-3">
                  <div class="card"></div>
                </div>
                <!-- end aling -->
          <div class="col-lg-6">
            <div class="card card-primary card-outline">
              <div class="card-body">
                
                @include('partials.error-messages')
                
                <form id="quickForm" role="form" method="POST" action="{{ route('provincias.create') }}">
                {!! csrf_field() !!}
                <div class="card-body">
                  
                @include('componentes.name',['model'=>$provincia])

                <button type="submit" class="btn btn-success btn-flat">Crear</button>
                <a class="btn btn-flat btn-primary" href="{{route('provincias')}}">Cancelar</a>
                </div>
            </form>                
            
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection

@push('scripts')
  <!-- jquery-validation -->
  <script src="/adminlte/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="/adminlte/plugins/jquery-validation/additional-methods.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
   $('#quickForm').validate({
    rules: {
      name: {
        required: true,
        minlength: 5,
      },
    },
    messages: {
      name: {
        required: "Debe introducir el nombre",
        minlength: "El nombre debe tener 5 caracteres como mínimo"
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