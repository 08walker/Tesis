@extends('admin.layout')

@section('content')


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
      provincia_id: {
        required: true
      },
    },
    messages: {
      name: {
        required: "Debe introducir el nombre",
        minlength: "El nombre debe tener 5 caracteres como mínimo"
      },
      provincia_id: {
        required: "Por favor seleccione la provincia",
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