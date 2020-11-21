@extends('admin.layout')

@section('meta-title','Tesis| Recibidas')
@section('meta-description','Listado de transferencias recibidas')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Listado de Transferencias</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

	<div class="content">
	   <div class="container">
	      <div class="row">
		      <div class="col-lg-12">
		        <div class="card">
	            <div class="card-header">
	              <h3 class="card-title">Transferencias Recibidas:</h3> 
	              <br>
	            </div>
	            <!-- /.card-header -->
	            <div class="card-body">
	            	<table id="example1" class="table table-bordered table-striped">
					  <thead>
					    <tr>
					      <th>ID</th>
					      <th>Fecha de inicio</th>
					      <th>Fecha de llegada</th>
					      <th>Número de factura</th>
					      <th>Origen</th>
					      <th>Destino</th>
					      <th>Ver detalles</th>
					    </tr>
					  </thead>
					  <tbody>
					      @foreach($tranferencias as $transf)
					        <tr>
					          <td>{{$transf->id}}</td>
					          <td>{{\Carbon\Carbon::parse($transf->fyh_salida)->format('d/M/y')}}</td>
					          <td>{{\Carbon\Carbon::parse($transf->fyh_llegada)->format('d/M/y')}}</td>
					          <td>{{$transf->num_fact}}</td>
					          <td>{{$transf->origen->name}}</td>
					          <td>{{$transf->destino->name}}</td>
					          <td>
					            <a href="{{route('tenv.show',$transf)}}">
					              <i class="fa fa-eye"></i>arreglar esto
					            </a>
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