@extends('admin.layout')

@section('meta-title','Tesis| Transportaciones')
@section('meta-description','Listado de transportaciones')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Listado de transportaciones</h1>
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
              <h3 class="card-title">Transportaciones:</h3> 
              <br>
              {{-- esto de de momemnto porque no he hecho las policies --}}
              @can('update',new \App\Transportacion)
              <a href="{{route('transportaciones.create')}}" type="button" class="btn btn-primary btn-flat" >
                  <i class="fa fa-plus"></i> Crear
              </a>
              @endcan
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @include('tablas.transportaciones',['model'=>$transportaciones])
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