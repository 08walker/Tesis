@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Todos los datos:</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

	<div class="content">
	   <div class="container">
	      <div class="row">
	      	<div class="card-body">

	      		<a class="btn btn-flat btn-primary" href="{{route('transportaciones')}}">
	      			<i class="fa fa-arrow-left"></i> Atras
	      		</a>
	      		<br>
	      		<br>
				@include('componentes.transpcallout',['model'=>$transportacion])
				@foreach($transportacion->transfenviada as $transferencia)
					@include('componentes.transfercallout',['model'=>$transferencia])
					@include('componentes.prodcallout',['model'=>$transferencia])
				@endforeach

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