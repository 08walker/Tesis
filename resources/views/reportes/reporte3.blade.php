@extends('admin.layout')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-md-1">
          </div>
          <div class="col-sm-10">
            <h1 class="m-0 text-dark">Comportamiento de la utilización de contenedores de la empresa.</h1>
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
                  <i class="far fa-chart-bar"></i>
                  Gráfico de barras (Días sin utilizar/Identificador de los contenedores)
                </h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Identificador</th>
                    <th>Días sin utilizar</th>
                    <th>Días utilizados</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($envases as $dato)
                  <tr>
                    <td>{{$dato->identificador}}</td>
                    <td>{{\Carbon\Carbon::now()->diffInDays($dato->ultima_vez)}}</td>
                    <td>{{\Carbon\Carbon::parse($dato->primera_vez)->diffInDays($dato->ultima_vez)}}</td>
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