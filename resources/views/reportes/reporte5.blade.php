@extends('admin.layout')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1 class="m-0 text-dark">Reporte de última ubicación de contenedores propios.</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-md-2">
          </div>
          <!-- /.col -->
          <div class="col-md-8">
            <!-- Bar chart -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  Contenedores de la empresa última transportación 
                </h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Identificador</th>
                    <th>Días sin utilizar</th>
                    <th>Lugar de destino</th>
                    <th>Ver transportación</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($envases as $dato)
                  <tr>
                    <td>{{$dato->identificador}}</td>
                    <td>{{\Carbon\Carbon::now()->diffInDays($dato->ultima_vez)}}</td>
                    <td>{{$dato->lugares_name}}</td>
                    <td>{{$dato->transportacion->numero}}
                          <a href="{{ route('transportaciones.detalles',$dato->transportacion) }}" class="btn btn-xs btn-primary">
                            Ver detalles
                          </a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>                
              </div>
              <!-- /.card-body-->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection
@include('tablas.estilos')