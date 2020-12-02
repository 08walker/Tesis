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
	      		<br><br>

    				@include('componentes.callouttransp',['model'=>$transportacion])
    				@foreach($transportacion->transfenviada as $transferencia)
    					@include('componentes.callouttransfer',['model'=>$transferencia])
    					@include('componentes.calloutprod',['model'=>$transferencia])
    				@endforeach

	      	</div>
	      </div>		      
	   </div>
	</div>
</div>
@endsection