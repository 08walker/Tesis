@extends('admin.layout')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1 class="m-0 text-dark"> Productos que más se transportaron en el mes de Noviembre</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-md-2">
          </div>
          <div class="col-md-8">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
              
                <form id="quickForm" role="form" method="POST" action="{{ route('reportes.reporte1filtrado') }}">
                    {!! csrf_field() !!}
                  <!-- Date range -->
                <div class="form-group">
                  <label>Seleccione el rango de fecha:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text" name="rango" class="form-control float-right" id="reservation">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
                <button type="submit" class="btn btn-success btn-flat">
                  {{-- <i></i> --}}
                  Filtrar
                </button>
              </form>
                </h3>
              </div>
              <!-- /.card-body-->
            </div>
          </div>
          <div class="col-md-2">
          </div>
          <div class="col-md-2">
          </div>
          <!-- /.col -->
          <div class="col-md-8">
            <!-- Bar chart -->
            @isset($productos)
            <div class="card card-primary card-outline">
              <div class="card-header">
                  <div class="row">
                    <div class="col-12">                  
                      <h3>
                        Productos:  
                      </h3>                      
                    </div>
                    <div class="col-12">                  
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                          </tr>
                          </thead>

                          <tbody>
                          @foreach($productos as $data)
                          <tr>
                            <td>{{$data->producto->name}}</td>
                            <td>{{$data->suMpeso}}</td>
                          </tr>
                          @endforeach
                          </tbody>
                      </table>
                    </div>
                </div>
              </div>
              <!-- /.card-body-->
            </div>
            @endisset
            <!-- /.card -->

            <!-- Bar chart -->
            {{-- @isset($nombres)
            <div class="card card-primary card-outline">
              <div class="card-header">
                  <div class="row">
                    <div class="col-12">                  
                      <h3>
                        Productos:  
                      </h3>                      
                    </div>
                    <div class="col-12">                  
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                          </tr>
                          </thead>

                          <tbody>
                          @foreach($nombres as $data)
                          <tr>
                            <td>{{$data}}</td>
                          </tr>
                          @endforeach
                          </tbody>
                      </table>
                    </div>
                </div>
              </div>
              <!-- /.card-body-->
            </div>
            @endisset --}}
            <!-- /.card -->
          </div>
          <div class="col-md-2">
          </div>
          <div class="col-md-2">
          </div>
          <!-- /.col -->
          {{-- <div class="col-md-8">
            <!-- Bar chart -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  Gráfico de barras (Kilogramos/Productos)
                </h3>
              </div>
              <div class="card-body">
                <div id="bar-chart" style="height: 300px;"></div>
              </div>
              <!-- /.card-body-->
            </div> --}}

            <!-- BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Bar Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@push('styles')
  <!-- daterange picker -->
  <link rel="stylesheet" href="/adminlte/plugins/daterangepicker/daterangepicker.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">  
@endpush
  
@push('scripts')
<!-- jQuery -->
{{-- <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI -->
<script src="/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- FLOT CHARTS -->
<script src="/adminlte/plugins/flot/jquery.flot.js"></script> --}}
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="/adminlte/plugins/flot-old/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="/adminlte/plugins/flot-old/jquery.flot.pie.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- ChartJS -->
<script src="/adminlte/plugins/chart.js/Chart.min.js"></script>

<!-- InputMask -->
<script src="/adminlte/plugins/moment/moment.min.js"></script>
<script src="/adminlte/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="/adminlte/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->

<script src="/adminlte/dist/js/demo.js"></script>
<!-- AdminLTE App -->
<script src="/adminlte/dist/js/adminlte.min.js"></script>
<!-- Page script -->
<script>
  <script>
  $(function () {

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Digital Goods',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : 'Electronics',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })

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
</script>
@endpush
@include('tablas.estilos')