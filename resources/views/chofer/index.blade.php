@extends('admin.layout')

@section('meta-title','Tesis| Choreferes')
@section('meta-description','Listado de choferes')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Listado de choferes</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    @include('partials.success')

<div class="content">
          <div class="container">
            <div class="row">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Choferes:</h3> 
              <br>
              <a href="{{route('choferes.create')}}" type="button" class="btn btn-primary btn-flat" >
                  <i class="fa fa-plus"></i> Crear
              </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Carnet de identidad</th>
                  <th>licencia</th>
                  <th>teléfono</th>
                  <th>Equipo</th>
                  <!-- <th>Es propio</th> -->
                  <th>Tercero</th>
                  <th>Organización</th>
                  <th>Acciones</th>
                </tr>
                </thead>

                <tbody>
                @foreach($choferes as $chofer)
                <tr>
                  <td>{{$chofer->id}}</td>
                  <td>{{$chofer->name}}</td>
                  <td>{{$chofer->apellido}}</td>
                  <td>{{$chofer->ci}}</td>
                  <td>{{$chofer->licencia}}</td>
                  <td>{{$chofer->telefono}}</td>
                  <td>{{$chofer->equipo->identificador}}</td>
                  <!-- <td>{{$chofer->es_propio}}</td> -->
                  <td>{{$chofer->tercero->name}}</td>
                  <td>{{$chofer->organizacion->name}}</td>
                  <td>
                      <a href="{{route('choferes.show',$chofer)}}" target="_blank">
                          <i class="fa fa-eye"></i>
                        </a>

                        <a href="{{route('choferes.edit',$chofer)}}" class="btn btn-xs btn-info">
                          <i class="fa fa-pen"></i>
                        </a>
                        <form method="POST" action="{{route('choferes.destroy', $chofer)}}" style="display: inline;">
                          {{csrf_field()}}{{method_field('DELETE')}}
                          <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estas seguro de que deseas elimiar el chofer?')">
                            <i class="fa fa-times"></i>
                          </button>
                        </form>
                  
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
  </div>
</div>
</div>
</div>
</div>

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
        "paginate": {
            "last": "Última página",
            "first": "Primera página",
            "next": "Siguiente",
            "previous": "Anterior",
          },
       },
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</script>
@endpush
@endsection