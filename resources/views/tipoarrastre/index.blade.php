@extends('admin.layout')

@section('meta-title','Tesis| Tipos de arrastre')
@section('meta-description','Tipos arrastres')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tipos de arrastres</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    @include('partials.success')
    @include('partials.demo')

<div class="content">
          <div class="container">
            <div class="row">
        <div class="col-lg-2">
            <div class="card">
            </div>
        </div>
        <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tipos:</h3> 
              <br>
              @can('create',new \App\TipoArrastre)
              <a href="{{route('tipoarrastre.create')}}" type="button" class="btn btn-primary btn-flat" >
                  <i class="fa fa-plus"></i> Crear
              </a>
              @endcan
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @include('tablas.tipoarrastre',['model'=>$tipoArrastre])
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