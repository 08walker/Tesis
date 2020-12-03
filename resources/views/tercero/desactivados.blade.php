@extends('admin.layout')

@section('meta-title','Tesis| Terceros')
@section('meta-description','Listado de terceros desactivados')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Listado de terceros desactivados</h1>
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
              <h3 class="card-title">Terceros:</h3> 
              <br>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @include('tablas.terceros',['model'=>$terceros])
            </div>
          </div>
  </div>
</div>
</div>
</div>
</div>
@endsection
@include('tablas.estilos')