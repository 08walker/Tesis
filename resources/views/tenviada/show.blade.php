@extends('admin.layout')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Listado de Productos</h1>
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
	              <h3 class="card-title">Productos:</h3> 
	              <br>
	              <a href="/home" type="button" class="btn btn-primary btn-flat" >
                    <i class="fa fa-arrow-left"></i> Atras
                  </a>
	              @can('create',new \App\TransfEnviada)
	              <a href="{{route('tenv.llenar',$transferencia)}}" type="button" class="btn btn-primary btn-flat" >
                    <i class="fa fa-plus"></i> Añadir Producto
                  </a>                  
                @endcan
	            </div>
	            <!-- /.card-header -->
	            <div class="card-body">
	            <table id="example1" class="table table-bordered table-striped">
	                <thead>
	                <tr>
	                  <th>ID</th>
	                  <th>Producto</th>
	                  <th>Peso</th>
	                  <th>Cantidad de bultos</th>
	                  <th>Volumen</th>
	                  <th>Observación</th>
	                  @can('update',new \App\TransfEnviada)
	                  <th>Acciones</th>
	                  @endcan
	                </tr>
	                </thead>

	                <tbody>
	                @foreach($transferencia->transfenvprod as $todo)
	                <tr>
	                  <td>{{$todo->id}}</td>
	                  <td>{{$todo->producto->name}}</td>
	                  <td>{{$todo->peso_kg}}</td>
	                  <td>{{$todo->cantidad_bultos}}</td>
	                  <td>{{$todo->volumen_m3}}</td>
	                  <td>{{$todo->observacion}}</td>
	                  @can('update',new \App\TransfEnviada)
	                  <td>
			            <a href="{{route('tenv.prod.edit',$todo->id)}}" class="btn btn-xs btn-info">
			              <i class="fa fa-pen"></i>
			            </a>
			              @can('delete',new \App\TransfEnviada)
			              <form method="POST" action="{{route('tenv.prod.destroy', $todo)}}" style="display: inline;">
			                {{csrf_field()}}{{method_field('DELETE')}}
			                <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estas seguro de que deseas elimiar el producto?')">
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