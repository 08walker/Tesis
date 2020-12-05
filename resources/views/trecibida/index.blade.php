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
					      {{-- <th>ID</th> --}}
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
					          {{-- <td>{{$transf->id}}</td> --}}
					          <td>{{\Carbon\Carbon::parse($transf->fyh_salida)->format('d/M/y')}}</td>
					          @if($transf->fyh_llegada)
					          <td>{{\Carbon\Carbon::parse($transf->fyh_llegada)->format('d/M/y')}}</td>
					          @else
					          <td></td>
					          @endif
					          <td>{{$transf->num_fact}}</td>
					          <td>{{$transf->origen->name}}</td>
					          <td>{{$transf->destino->name}}</td>
					          <td>
					            <a href="{{route('tenv.detalles',$transf)}}">
					              <i class="fa fa-eye"></i> Ver detalles
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
@include('tablas.estilos')