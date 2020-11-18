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
              <p><b>RF.1&nbsp;</b>&nbsp;&nbsp; Generar reporte con los productos que más se transfirieron en el mes.<br><b>RF.2&nbsp;</b>&nbsp;&nbsp; Generar un reporte mensual de transportaciones por chofer que facilite la facturación del pago del servicio, introduciendo los valores establecidos por Geocuba en las tablas de distancia para cada recorrido.<br><b>RF.3&nbsp;</b>&nbsp;&nbsp; Gráfico del comportamiento estadístico de la utilización de contenedores propios en días.<br><b>RF.4&nbsp;</b>&nbsp;&nbsp; Gráfico del análisis de costo de contenedores propios sin utilizar por mes. <br><b>RF.5&nbsp;&nbsp;</b>&nbsp; Reporte de ubicación de contenedores propios.<br><b>RF.6</b>&nbsp;&nbsp;&nbsp; Gráfico del comportamiento estadístico de la utilización de equipos propios en días, para determinar el nivel de utilización del parque de trasporte de la empresa.<br><b>RF.7&nbsp;&nbsp;</b>&nbsp; Análisis estadístico del cumplimiento del plan de transportaciones por organización.<br><b>RF.8</b>&nbsp;&nbsp;&nbsp; Generar reporte con los contenedores que llevan más de 7 días sin utilizarse. <br><b>RF.9</b>&nbsp;&nbsp;&nbsp; Generar reporte de transportaciones por:<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Chofer.<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Periodo (día, semana, mes, año).<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Contenedor.<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Equipo.<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Organización.<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Contenedor.<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Producto.<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Lugar (almacenes, principalmente donde se recibe la rama de tabaco).<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Contenedores propios que llevan determinados días sin utilizarse.<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Última ubicación contenedor.<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Última ubicación equipo.<br></p>
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