@extends('admin.layout')

@section('meta-title','Tesis| Usuarios')
@section('meta-description','Listado de usuarios')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Listado de usuarios</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    @include('partials.success')
    @include('partials.errors')

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
              <h3 class="card-title">Usuarios</h3>
              <br>
              
              @can('create', $users->first()) 
              <a class="btn btn-primary btn-flat" href="{{route('user.create')}}">
                <i class="fa fa-plus"></i> 
                Crear 
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
                  <th>Email</th>
                  <th>Roles</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                
                <tbody>
                  @foreach($users as $user)
                    <tr>
                      <td>{{$user->id}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->getRoleNames()->implode(', ')}}</td>
                      
                      <td>
                        <a href="{{route('user.show',$user)}}">
                          <i class="fa fa-eye"></i>
                        </a>

                        @if($user->id!==1)
                        @can('update',$user)
                        <a href="{{route('user.edit',$user)}}" class="btn btn-xs btn-info">
                          <i class="fa fa-pen"></i>
                        </a>
                        @endcan

                        @role('Admin')
                        <form method="POST" action="{{route('user.destroy', $user)}}" style="display: inline;">
                          {{csrf_field()}}{{method_field('DELETE')}}
                          <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estas seguro de que deseas elimiar la usuario?')">
                            <i class="fa fa-times"></i>
                          </button>
                        </form>
                        @endrole

                        @endif

                      </td>
                    </tr>
                  @endforeach
                </tbody>

              </table>
            </div>
      </div>
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
@endpush