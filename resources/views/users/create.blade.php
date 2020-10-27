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
                
                <form id="quickForm" method="POST" action="{{route('user.store')}}">
				{{ csrf_field() }}
		
		            <div class="form-group">
					<label for="name">Nombre:</label>
		                  <input type="text" class="form-control" name="name" value="{{old('name')}}">
					</div>
				
		            <div class="form-group">
					<label for="email">Correo electrónico:</label>
		                  <input type="text" class="form-control" name="email" value="{{old('email')}}">
					</div>
					<div class="row">
					<div class="form-group col-md-6">
						<label for="">Roles:</label>
					    @include('componentes.roles-checkboxes')
					</div>{{-- 
					<div class="form-group col-md-6">
						<label for="">Permisos:</label>
				        @include('componentes.permissions-checkboxes',['model'=>$user])
					</div> --}}
					</div>

		            {{-- <span class="help-block">La contraseña será generada y enviada via email</span> --}}

		            <div class="form-group">
		                  <label for="password">Contraseña:</label>
		                  <input type="password" class="form-control" name="password">
		            </div>

		            <div class="form-group">
		                  <label for="password_confirmation">Repita la contraseña:</label>
		                  <input type="password" class="form-control" name="password_confirmation">
		            </div>
				
		            <button class="btn btn-primary btn-flat btn-block" type="submit">Crear usuario</button>
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
      email: {
        required: true,
      },
      password: {
        required: true,
        minlength: 8,
      },
      password_confirmation: {
        required: true,
        minlength: 8,
      },
    },
    messages: {
      name: {
        required: "Debe introducir el nombre",
        minlength: "El nombre debe tener 5 caracteres como mínimo"
      },
      email: {
        required: "Debe introducir el correo"
      },
      password: {
        required: "Debe introducir la contraseña",
        minlength: "El nombre debe tener 8 caracteres como mínimo"
      },
      password_confirmation: {
        required: "Debe introducir la contraseña",
        minlength: "El nombre debe tener 8 caracteres como mínimo"
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