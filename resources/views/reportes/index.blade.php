@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Listado de Reportes</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


 <div class="content">
    <div class="container">
     <div class="row">
        <div class="col-lg-2">
            <div class="card">
            </div>
        </div>
        <div class="col-lg-8">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Reportes:</h3> 
                <br>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <p><b>Reporte #1&nbsp;</b>&nbsp;&nbsp; <a href="{{ route('reportes.reporte1') }}">Productos y cantidades transferidos en el periodo seleccionado.</a><br>
              <b>Reporte #2&nbsp;</b>&nbsp;&nbsp; <a href="{{ route('reportes.reporte2') }}">Transportaciones por chofer que facilite la facturación del pago del servicio.</a><br>
              <b>Reporte #3&nbsp;</b>&nbsp;&nbsp; <a href="{{ route('reportes.reporte3') }}">Comportamiento de la utilización de contenedores de la empresa.</a><br>
              <b>Reporte #4&nbsp;</b>&nbsp;&nbsp; <a href="{{ route('reportes.reporte4') }}">Comportamiento del costo de contenedores de la empresa.</a><br>
              <b>Reporte #5&nbsp;&nbsp;</b>&nbsp; <a href="{{ route('reportes.reporte5') }}">Ubicación de contenedores propios.</a><br>
              <b>Reporte #6</b>&nbsp;&nbsp;&nbsp; <a href="{{ route('reportes.reporte6') }}">Comportamiento de la utilización de equipos de la empresa.</a><br>
              {{-- <b>Reporte #7&nbsp;&nbsp;</b>&nbsp; Análisis estadístico del cumplimiento del plan de transportaciones por organización.<br> --}}
              <b>Reporte #7</b>&nbsp;&nbsp;&nbsp; <a href="{{ route('reportes.reporte7') }}">Generar reporte con los contenedores que llevan más de 7 días sin utilizarse.</a><br>
              <b>Seleccione la opción para optener las transportaciones:</b><br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
              <b>Reporte #8</b>&nbsp;&nbsp;<a href="{{ route('reportes.reporte8') }}">Chofer.</a><br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
              {{-- Periodo (día, semana, mes, año).<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  --}}
              <b>Reporte #9</b>&nbsp;&nbsp;<a href="{{ route('reportes.reporte9') }}">Contenedor.</a><br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
              <b>Reporte #10</b>&nbsp;&nbsp;<a href="{{ route('reportes.reporte10') }}">Equipo.</a><br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
              <b>Reporte #11</b>&nbsp;&nbsp;<a href="{{ route('reportes.reporte11') }}">Organización.</a><br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
              <b>Reporte #12</b>&nbsp;&nbsp;<a href="{{ route('reportes.reporte12') }}">Producto.</a><br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
              <b>Reporte #13</b>&nbsp;&nbsp;<a href="">Lugar (almacenes, principalmente donde se recibe la rama de tabaco).</a><br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
              <b>Reporte #14</b>&nbsp;&nbsp;<a href="">Contenedores propios que llevan determinados días sin utilizarse.</a><br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
              <b>Reporte #15</b>&nbsp;&nbsp;<a href="">Última ubicación contenedor.</a><br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
              <b>Reporte #16</b>&nbsp;&nbsp;<a href="">Última ubicación equipo.</a><br></p>
              </div>
              <!-- /.card-body -->
          </div>
            <!-- /.card -->
          </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('styles')
    <!-- DataTables -->
  <link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endpush

@push('scripts')

<!-- DataTables -->
<script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script src="/adminlte/dist/js/demo.js"></script>
<!-- page script -->
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
</script>

@endpush  