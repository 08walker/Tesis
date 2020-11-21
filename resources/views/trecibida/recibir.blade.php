@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Recibir transferencia</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    @include('partials.success')
    @include('partials.errors')

    <div class="content">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
              	  <div class="card-header">
                  <div class="row">
                        <div class="col-3">
                          <p>Fecha de salida: <strong>'fyh_salida'</strong></p>
                        </div>
                        <div class="col-3">
                          <p>Número de factura: <strong>'num_fact'</strong></p>
                        </div>
                        <div class="col-3">
                          <p>Origen: <strong>'origen_id'</strong></p>
                        </div>
                        <div class="col-3">
                          <p>Destino: <strong>'destino_id'</strong></p>
                        </div>
                  </div>
                  </div>
                </div>
                  <div class="card-header">
                    <h3 class="card-title">Recibir:</h3> 
                    <br>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">

                    {{-- <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Fecha</th>
                          <th>Descripción</th>
                          <th>Accedió desde</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($trazas as $traza)
                          <tr>
                            <td>{{$traza->id}}</td>
                            <td>{{$traza->created_at->format('d/M/Y H:i:s')}}</td>
                            <td>{{$traza->description}}</td>
                            <td>{{$traza->ip}}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table> --}}
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