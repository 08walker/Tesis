@extends('admin.layout')

@section('meta-title','Tesis| Enviadas')
@section('meta-description','Listado de transferencias enviadas')

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
	              <h3 class="card-title">Transferencias Enviadas:</h3> 
	              <br>
                <a class="btn btn-flat btn-primary" href="{{route('transportaciones.formllenar',$transportacion)}}">
                  <i class="fa fa-arrow-left"></i> Atras</a>
                  @if(!$transportacion->terminada)
	              <a href="{{route('tenv.create',$transportacion)}}" type="button" class="btn btn-primary btn-flat" >
                    <i class="fa fa-plus"></i> Crear
                </a>
                @endif
	            </div>
	            <!-- /.card-header -->
	            <div class="card-body">
	              
	              @include('tablas.transferencias',['model'=>$transportacion->transfenviada])
	            
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