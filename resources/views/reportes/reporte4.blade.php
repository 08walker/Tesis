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
            <h1 class="m-0 text-dark">Reporte #4 Comportamiento del costo de contenedores de la empresa. </h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-md-2">
          </div>
          <!-- /.col -->
          <div class="col-md-8">
            <!-- Bar chart -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <a href="{{route('reportes')}}" type="button" class="btn btn-primary btn-flat" >
                          <i class="fa fa-arrow-left"></i> Atras
                        </a>                 
              </div>
              <div class="card-body">
                {{-- <div id="bar-chart" style="height: 300px;"></div>               --}}
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Identificador</th>
                    <th>Costo de días sin utilizar</th>
                    <th>Costo de días utilizados</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($envases as $dato)
                  <tr>
                    <td>{{$dato->identificador}}</td>
                    <td>{{(\Carbon\Carbon::now()->diffInDays($dato->ultima_vez))*500}}</td>
                    <td>{{(\Carbon\Carbon::parse($dato->primera_vez)->diffInDays($dato->ultima_vez))*500}}</td>
                  </tr>
                  @endforeach
                  </tbody>
              </table>
              </div>

              <!-- /.card-body-->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection

@push('scripts')
<!-- jQuery -->
<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI -->
<script src="/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- FLOT CHARTS -->
<script src="/adminlte/plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="/adminlte/plugins/flot-old/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="/adminlte/plugins/flot-old/jquery.flot.pie.min.js"></script>

<script src="/adminlte/dist/js/demo.js"></script>
<!-- AdminLTE App -->
<script src="/adminlte/dist/js/adminlte.min.js"></script>

<!-- Page script -->
<script>
  $(function () {

    /*
     * BAR CHART
     * ---------
     */

    var bar_data = {
      data : [[1,10], [2,8], [3,4], [4,13], [5,17], [6,9]],
      bars: { show: true }
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
         bars: {
          show: true, barWidth: 0.5, align: 'center',
        },
      },
      colors: ['#3c8dbc'],
      xaxis : {
        ticks: [[1,'GaXhsRK8cw'], [2,'b4B96RtaE5'], [3,'7mMC3Uhw0L'], [4,'2Pk0BTD4hw'], [5,'CAIXakwH1T'], [6,'Capote #1']]
      }
    })
    /* END BAR CHART */
  })

  /*
   * Custom Label formatter
   * ----------------------
   */
  // function labelFormatter(label, series) {
  //   return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
  //     + label
  //     + '<br>'
  //     + Math.round(series.percent) + '%</div>'
  // }
</script>
@endpush
@include('tablas.estilos')