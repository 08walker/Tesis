@extends('admin.layout')

@section('meta-title','Tesis| Directivos')
@section('meta-description','Listado de directivos desactivados')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Listado de directivos desactivados</h1>
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
                <h3 class="card-title">Directivo:</h3> 
                <br>
              </div>
              <div class="card-body">
                @include('tablas.directivos',['model'=>$directivos])
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@include('tablas.estilos')