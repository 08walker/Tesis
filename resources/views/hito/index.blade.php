@extends('admin.layout')

@section('meta-title','Tesis| Incidencias')
@section('meta-description','Listado de incidencias')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Listado de incidencias</h1>
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
							<h3 class="card-title">Incidencias:</h3> 
						<br>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						@include('tablas.incidencias',['model'=>$incidencias])
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