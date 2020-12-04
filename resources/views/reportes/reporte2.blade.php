@extends('admin.layout')

@section('content')

<div class="content-wrapper">

  <div class="content-header">

    <div class="container">
          <div class="card card-primary card-outline">
            <div class="card-body">
              <form id="quickForm" role="form" method="POST" action="{{ route('reportes.reporte2filtrado') }}">
                  {!! csrf_field() !!}
                  <div class="container">
                    <div class="row">
                      <div class="col-md-6">
                        @include('foreach.choferfor',['model'=>$choferes])
                      </div>
                      <div class="col-md-6">
                        @include('componentes.rangofecha')
                      </div>
                      <div class="col-md-6">
                        <button type="submit" class="btn btn-success btn-flat">Filtrar</button>
                      </div>
                    </div>
                  </div>
              </form>
            </div>
          </div>
    </div>
</div>
    @isset($chofertransp)
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <div class="row">
                    <div class="col-12">
                      <h3 class="card-title">
                        Datos del chofer:
                      </h3>
                    </div>                  
                    <div class="col-4">
                      <p>Nombre: <strong>{{$chofertransp->first()->choferes->name}} {{$chofertransp->first()->choferes->apellido}}</strong></p>
                    </div>

                    <div class="col-4">
                      <p>Carnet de identidad: <strong>{{$chofertransp->first()->choferes->ci}}</strong></p>
                    </div>

                    <div class="col-4">
                      <p>Teléfono: <strong>{{$chofertransp->first()->choferes->telefono}}</strong></p>
                    </div>
                    
                    <div class="col-4">
                      @if($chofertransp->first()->choferes->tercero)
                        <p>Tercero: <strong>{{$chofertransp->first()->choferes->tercero->name}}</strong></p>
                      @elseif($chofertransp->first()->choferes->organizacion)
                        <p>Organización: <strong>{{$chofertransp->first()->choferes->organizacion->name}}</strong></p>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Transportación</th>
                    <th>Transferencia</th>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Fecha de salida</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($chofertransp as $transp)
                  @foreach($transp->transportaciones->transfenviada as $viaje)
                  <tr>
                    <td>{{$transp->transportaciones->numero}}</td>
                    <td>{{$viaje->num_fact}}</td>
                    <td>{{$viaje->origen->name}}</td>
                    <td>{{$viaje->destino->name}}</td>
                    <td>{{\Carbon\Carbon::parse($viaje->fyh_salida)->format('d/M/y')}}</td>
                  </tr>
                  @endforeach
                  @endforeach
                  </tbody>
                </table>
                </div>
              </div>
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
      chofer_id: {
        required: true,
      },
    },
    messages: {
      chofer_id: {
        required: "Debe seleccionar un chofer",
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