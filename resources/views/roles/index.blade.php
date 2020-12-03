@extends('admin.layout')

@section('meta-title','Tesis| Roles')
@section('meta-description','Listado de Roles')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Listado de Roles</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    @include('partials.success')
    @include('partials.demo')

<div class="content">
          <div class="container">
            <div class="row">
        <div class="col-lg-1">
            <div class="card">
            </div>
        </div>
        <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Roles:</h3> 
              <br>

              @can('create',$roles->first())
              <a class="btn btn-primary btn-flat" href="{{route('admin.roles.create')}}">
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
                  <th>Nombre</th>
                  <th>Permisos</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                
                <tbody>
                  @foreach($roles as $role)
                    <tr>
                      <td>{{$role->id}}</td>
                      <td>{{$role->name}}</td>
                      <td>{{$role->permissions->pluck('display_name')->implode(', ')}}</td>
                      <td>
                        @can('update',$role)
                        <a href="{{route('admin.roles.edit',$role)}}" class="btn btn-xs btn-info">
                          <i class="fa fa-pen"></i>
                        </a>
                        @endcan
                        @can('delete',$role)
                        @if($role->id !==1)
                        <form method="POST" action="{{route('admin.roles.destroy', $role)}}" style="display: inline;">
                          {{csrf_field()}}{{method_field('DELETE')}}
                          <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estas seguro de que deseas elimiar la role?')">
                            <i class="fa fa-times"></i>
                          </button>
                        </form>
                        @endif
                        @endcan
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
@stop

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
@endpush