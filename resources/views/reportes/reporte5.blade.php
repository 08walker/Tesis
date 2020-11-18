@extends('admin.layout')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1 class="m-0 text-dark">Reporte de última ubicación de contenedores propios.</h1>
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
                  Contenedores de la empresa última transportación 
                </h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Días sin utilizar</th>
                    <th>Identificador:</th>
                    <th>Lugar de destino</th>
                    <th>Ver transportación</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>8</td>
                    <td>GaXhsRK8cw</td>
                    <td>Olivia Hurtado</td>
                    <td>
                          <a href="#" class="btn btn-xs btn-info">
                            PJGO8aa
                          </a>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>6</td>
                    <td>b4B96RtaE5</td>
                    <td>Lucía Barrera</td>                    
                    <td>
                          <a href="#" class="btn btn-xs btn-info">
                            4niI30c
                          </a>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>5</td>
                    <td>7mMC3Uhw0L</td>
                    <td>Adam Baca</td>
                    <td>
                          <a href="#" class="btn btn-xs btn-info">
                            ns30Hz4
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