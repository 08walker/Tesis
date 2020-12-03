@extends('admin.layout')

@section('meta-title','Tesis| Arrastres')
@section('meta-description','Listado de arrastres')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Listado de arrastres desactivados</h1>
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
                  <h3 class="card-title">Arrastres:</h3> 
                  <br>
                  @can('create',new \App\Arrastre)
                    <a href="{{route('arrastres.create')}}" type="button" class="btn btn-primary btn-flat" >
                      <i class="fa fa-plus"></i> Crear
                    </a>
                  @endcan
                </div>
                <div class="card-body">
                    @include('tablas.arrastres',['model'=>$arrastres])
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
@include('tablas.estilos')