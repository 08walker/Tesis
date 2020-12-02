@extends('admin.layout')

@section('meta-title','Tesis| Recibida')
@section('meta-description','Detalles de la transferencia recibida')

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

	      		<a class="btn btn-flat btn-primary" href="{{route('tenv.recibidas')}}">
	      			<i class="fa fa-arrow-left"></i> Atras
	      		</a>
	      		<br>
	      		<br>

	      		@include('componentes.transpcallout',['model'=>$transferencia])	      		
	      		@include('componentes.transfercallout',['model'=>$transferencia])
	      		@include('componentes.prodcallout',['model'=>$transferencia])

	      	 </div>
	       </div>		      
	   </div>
	</div>
</div>
@endsection