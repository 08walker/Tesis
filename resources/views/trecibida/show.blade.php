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
            <h1 class="m-0 text-dark"> Todos los datos:</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

	<div class="content">
	   <div class="container">
	      <div class="row">
	      	<div class="card-body">

	      		<div class="callout callout-danger">
	      			<div class="col-12">
	      				<div class="container">
		      				<div class="row">
			      				<div class="col-sm-12">
			            			<h3>Tranportación:</h3>
			            		</div>
		                        <div class="col-sm-3">
		                          <p>Identificador: <strong>{{$transferencia->transportacion->numero}}</strong></p>
		                        </div>
		                        <div class="col-sm-5">
		                          <p>Observación: <strong>{{$transferencia->transportacion->observacion}}</strong></p>
		                        </div>
		                        <div class="col-sm-4">
		                          <p>Equipo: <strong>{{$transferencia->transportacion->equipo->identificador}}</strong></p>
		                        </div>
	                        </div>
	                    
	                        <div class="row">
		                        <div class="col-sm-6">
		                        	<strong>Choferes:</strong>
		                        	<table id="example2" class="table table-bordered table-striped">
		                        	<thead>
		                        		<tr>
		                        			<th>Nombre</th>
		                        			<th>Apellidos</th>
		                        			<th>Carnet</th>
		                        			<th>Teléfono</th>
		                        		</tr>
		                        	</thead>
		                        	<tbody>
		                          		@foreach($transferencia->transportacion->choferes as $chofer)
		                        		<tr>
		                        			<td>{{$chofer->name}}</td>
		                        			<td>{{$chofer->apellido}}</td>
		                        			<td>{{$chofer->ci}}</td>
		                        			<td>{{$chofer->telefono}}</td>
		                        		</tr>
		                        		@endforeach
		                        	</tbody>
		                        	</table>
	                        	</div>

		                        <div class="col-sm-6">
		                        	<strong>Arrastres:</strong>
		                        	<table id="example2" class="table table-bordered table-striped">
		                        	<thead>
		                        		<tr>
		                        			<th>Identificador</th>
		                        			<th>Descripción</th>
		                        		</tr>
		                        	</thead>
		                        	<tbody>
		                          		@foreach($transferencia->transportacion->arrastretrasnp as $arrastre)
		                        		<tr>
		                        			<td>{{$arrastre->arrastres->identificador}}</td>
		                        			<td>{{$arrastre->arrastres->description}}</td>
		                        		</tr>
		                        		@endforeach
		                        	</tbody>
		                        	</table>
		                        </div>
	                    	</div>

	                        <div class="col-sm-6">
	                        	<strong>Envases:</strong>
	                        	<table id="example2" class="table table-bordered table-striped">
		                        	<thead>
		                        		<tr>
		                        			<th>Identificador</th>
		                        		</tr>
		                        	</thead>
		                        	<tbody>
		                          		@foreach($transferencia->transportacion->arrastretrasnp as $arras)
			                          		@foreach($arras->arrastenva as $dat)
				                        		<tr>
				                        			<td>{{$dat->envase->identificador}}</td>
				                        		</tr>
			                        		@endforeach
		                        		@endforeach
		                        	</tbody>
	                        	</table>
	                        </div>
	                    </div>
	                </div>
	            </div>

              <div class="callout callout-info">
      			<div class="container">
      				<div class="row">
      					<div class="col-12">
	            			<h3>Tranferencia:</h3>
	            		</div>
	            		<div class="col-4">
                          <p>Fecha de salida: <strong>{{\Carbon\Carbon::parse($transferencia->fyh_salida)->format('d/M/y')}}</strong></p>
                        </div>
                        <div class="col-4">
                          <p>Fecha de llegada: <strong>{{\Carbon\Carbon::parse($transferencia->fyh_llegada)->format('d/M/y')}}</strong></p>
                        </div>
                        <div class="col-4">
                          <p>Número de factura: <strong>{{$transferencia->num_fact}}</strong></p>
                        </div>
                        <div class="col-4">
                          <p>Origen: <strong>{{$transferencia->origen->name}}</strong></p>
                        </div>
                        <div class="col-4">
                          <p>Destino: <strong>{{$transferencia->origen->name}}</strong></p>
                        </div>
                    </div>
      			</div>
      		  </div>

      		  <div class="callout callout-info">
      		  	<div class="container">
      		  		<div class="row">
      		  			<div class="col-12">
            				<h3>Productos:</h3>
             			</div>
             			<div class="col-12">
				             <table id="example2" class="table table-bordered table-striped">
				                <thead>
				                <tr>
				                  <th>Producto</th>
				                  <th>Peso</th>
				                  <th>Cantidad de bultos</th>
				                  <th>Volumen</th>
				                  <th>Observación</th>
				                </tr>
				                </thead>

				                <tbody>
				                @foreach($transferencia->transfenvprod as $todo)
				                <tr>
				                  <td>{{$todo->producto->name}}</td>
				                  <td>{{$todo->peso_kg}}</td>
				                  <td>{{$todo->cantidad_bultos}}</td>
				                  <td>{{$todo->volumen_m3}}</td>
				                  <td>{{$todo->observacion}}</td>
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