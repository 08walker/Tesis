@extends('admin.layout')

@section('meta-title','Tesis| Municipios')
@section('meta-description','Listado de municipios')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Listado de municipios</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    @include('partials.success')
    @include('partials.errors')

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
              <h3 class="card-title">Municipios:</h3> 
              <br>

              @can('create',new \App\Municipio)
              <a href="{{route('municipios.create')}}" type="button" class="btn btn-primary btn-flat" >
                  <i class="fa fa-plus"></i> Crear
              </a>
              @endcan

            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Provincia</th>
                  <th>Nombre</th>

                  @can('update',new \App\Municipio)
                  <th>Acciones</th>
                  @endcan

                </tr>
                </thead>

                <tbody>
                @foreach($municipios as $municipio)
                <tr>
                  <td>{{$municipio->id}}</td>
                  <td>{{$municipio->provincia->name}}</td>
                  <td>{{$municipio->name}}</td>
                  @can('update',new \App\Municipio)
                  <td>
                        {{-- <a href="{{route('municipios.show',$municipio)}}" target="_blank">
                          <i class="fa fa-eye"></i>
                        </a> --}}

                        <a href="{{route('municipios.edit',$municipio)}}" class="btn btn-xs btn-info">
                          <i class="fa fa-pen"></i>
                        </a>
                        
                        @can('delete',new \App\Municipio)
                        <form method="POST" action="{{route('municipios.destroy', $municipio)}}" style="display: inline;">
                          {{csrf_field()}}{{method_field('DELETE')}}
                          <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estas seguro de que deseas elimiar el municipio?')">
                            <i class="fa fa-times"></i>
                          </button>
                        </form>
                        @endcan
                  </td>
                  @endcan
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