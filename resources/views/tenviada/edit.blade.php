@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Actualizar Tranferencia</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    @include('partials.success')
    @include('partials.demo')

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
                
                <form id="quickForm" role="form" method="POST" action="{{ route('tenv.update',$transfEnviada) }}">
                {{ method_field('PUT') }}
                {!! csrf_field() !!}
                <div class="card-body">
                  
    		        <div class="form-group">
						      <label for="exampleInputdate11">Fecha de salida:</label>
				          <strong>
                    {{ \Carbon\Carbon::parse($transfEnviada->fyh_salida)->format('d/M/y')}}
                  </strong>
						      <input type="date" class="form-control" name="fyh_salida" 
						      value="old('fyh_salida',$transfEnviada-> fyh_salida ?$transfEnviada->fyh_salida->format('d/m/y')):null">
        					  <div class="has-error">
        					      @if($errors->has('fyh_salida'))
        					        <font color="#FF0000">
        					              <span style="background-color: inherit;">
        					                {{$errors->first('fyh_salida')}}
        					              </span>
        					        </font>
        					      @endif
        					  </div>
					       </div>

    		        @include('componentes.numerfact',['model'=>$transfEnviada])

    		        @include('foreach.origenfor',['model'=>$transfEnviada])

    		        @include('foreach.destinofor',['model'=>$transfEnviada])

                <button type="submit" class="btn btn-success btn-flat">Actualizar</button>
                <a class="btn btn-flat btn-primary" href="{{route('home')}}">Cancelar</a>

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
    },
    messages: {
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