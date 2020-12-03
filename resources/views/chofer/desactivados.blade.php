@extends('admin.layout')

@section('meta-title','Tesis| Choferes')
@section('meta-description','Listado de choferes desactivados')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Listado de choferes desactivados</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    @include('partials.success')
    @include('partials.demo')

    <div class="content">
        <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Choferes:</h3> 
                    <br>
                  </div>
                  <div class="card-body">
                    @include('tablas.choferes',['model'=>$choferes])
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
@include('tablas.estilos')