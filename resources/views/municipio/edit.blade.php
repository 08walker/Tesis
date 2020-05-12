@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Actualizar municipio</h1>
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
                    
                    <form method="POST" id="quickForm" action="{{ route('municipios.update',$municipio) }}">
                    {{ method_field('PUT') }} {!! csrf_field() !!}
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputName1">Nombre:</label>
                        <input autofocus="" type="text" class="form-control" name="name" id="exampleInputPassword1" placeholder="Escriba el nombre" value="{{$municipio->name,old('name')}}">
                      <div class="has-error">
                            @if($errors->has('name'))
                            <span id="helpBlock2" class="help-block">{{$errors->first('name')}}</span>
                            @endif
                      </div>
                      </div>

                      @include('foreach.provinciafor')

                    <button type="submit" class="btn btn-success btn-flat">Crear</button>
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
  <!-- jquery-validation -->
  <script src="/adminlte/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="/adminlte/plugins/jquery-validation/additional-methods.min.js"></script>

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
<script type="text/javascript">
$(document).ready(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
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