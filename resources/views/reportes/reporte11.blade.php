@extends('admin.layout')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-md-1">
          </div>
          <div class="col-sm-10">
            <h1 class="m-0 text-dark"> Reporte #11 Filtrar transportaciones por organizaciones.</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

     @include('partials.demo')

    <div class="row">
          <div class="col-md-2">
          </div>
          <div class="col-md-8">
          <div class="card card-primary card-outline">
              <div class="card-body">
              <form id="quickForm" role="form" method="POST" action="{{ route('reportes.reporte11filtrado') }}">
                  {!! csrf_field() !!}
                  <div class="container">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
						    <label for="exampleInputEmail1">Seleccione la organización:</label>
						      		<select class="form-control select2" style="width: 100%;" name="organizacion_id">
						          <option value="">
						            --------Seleccione la organización--------
						          </option>
						          @foreach($organizaciones->all() as $org)
						                <option value="{{$org->id}}">{{$org->name}}</option>
						          @endforeach
						      </select>
						      <div class="has-error">
						        @if($errors->has('organizacion_id'))
						        <font color="#FF0000">
						                <span style="background-color: inherit;">
						                    {{$errors->first('organizacion_id')}}
						                </span>
						        </font>
						        @endif
						    </div>
						</div>
                      </div>
                      {{-- <div class="col-md-6">
                        @include('componentes.rangofecha')
                      </div> --}}
                      <div class="col-md-6">
                      </div>
                      <div class="col-md-6">
                        <a href="{{route('reportes')}}" type="button" class="btn btn-primary btn-flat" >
                          <i class="fa fa-arrow-left"></i> Atras
                        </a> 
                        <button type="submit" class="btn btn-success btn-flat">Filtrar</button>
                      </div>
                    </div>
                  </div>
              </form>
            </div>
          </div>
          </div>
    </div>
    @isset($lugares)
          <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <div class="row">
                    <div class="col-12">
                      <h3 class="card-title">
                        Datos de la organización:
                      </h3>
                    </div>                  
                    <div class="col-4">
                      <p>Nombre: <strong>{{$organizacion->name}}</strong></p>
                    </div>
                    <div class="col-4">
                        <p>Municipio: <strong>{{$organizacion->municipio->name}}</strong></p>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  @foreach($lugares as $lugar)
                  <h3>{{$lugar->name}}</h3>
                  @foreach($lugar->tenviadaorigen as $demo2)
                  @include('componentes.callouttransfer',['model'=>$demo2])
                  @endforeach                  
                  @endforeach                  
                </div>
              </div>
            </div>
          </div>
    @endisset
</div>
@endsection

@push('styles')

  <!-- Select2 -->
  <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <!-- daterange picker -->
  <link rel="stylesheet" href="/adminlte/plugins/daterangepicker/daterangepicker.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
@endpush

@push('scripts')
<!-- Select2 -->
<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
  
<!-- InputMask -->
<script src="/adminlte/plugins/moment/moment.min.js"></script>
<script src="/adminlte/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

<!-- date-range-picker -->
<script src="/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="/adminlte/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<!-- DataTables -->
<script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- jquery-validation -->
<script src="/adminlte/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/adminlte/plugins/jquery-validation/additional-methods.min.js"></script>

<script src="/adminlte/dist/js/demo.js"></script>
<!-- page script -->
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

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "language": {
        "search": "Buscar",
        "lengthMenu": "Ver _MENU_ entradas",
        "info": "Mostrando página _PAGE_ de _PAGES_",
        "emptyTable": "No hay datos para mostrar",
        "paginate": {
            "last": "Última página",
            "first": "Primera página",
            "next": "Siguiente",
            "previous": "Anterior",
          },
       },
       
    });
  });
</script>
<script>
  //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })

    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )
    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
  /*
   * Custom Label formatter
   * ----------------------
   */
</script>
<script type="text/javascript">
$(document).ready(function () {
  $('#quickForm').validate({
    rules: {
      organizacion_id: {
        required: true,
      },
    },
    messages: {
      organizacion_id: {
        required: "Debe seleccionar una organización",
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