@extends('admin.layout')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1 class="m-0 text-dark"> Generar un reporte mensual de transportaciones por chofer que facilite la facturación del pago del servicio, introduciendo los valores establecidos por Geocuba en las tablas de distancia para cada recorrido.</h1>
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
                <h3 class="card-title">
                  Transportaciones por chofer del mes en curso:
                </h3>
              </div>
              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre y Apellidos:</th>
                    <th>Transportación</th>
                    <th>Ver recorrido</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>Fernando Estrada</td>
                    <td>45GEliGH</td>
                    <td>
                          <a href="#" class="btn btn-xs btn-info">
                            <i class="fa fa-eye"></i>
                          </a>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Jorge Mares</td>
                    <td>bEzE5gQ</td>
                    <td>
                          <a href="#" class="btn btn-xs btn-info">
                            <i class="fa fa-eye"></i>
                          </a>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Alberto Prado</td>
                    <td>yewImJW</td>
                    <td>
                          <a href="#" class="btn btn-xs btn-info">
                            <i class="fa fa-eye"></i>
                          </a>
                    </td>
                  </tr>
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