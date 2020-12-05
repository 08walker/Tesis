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
            <h1 class="m-0 text-dark">Reporte #7 Contenedores que llevan más de 7 días sin utilizarse.</h1>
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
                <a href="{{route('reportes')}}" type="button" class="btn btn-primary btn-flat" >
                          <i class="fa fa-arrow-left"></i> Atras
                        </a>                 
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
                  @if(\Carbon\Carbon::now()->diffInDays($dato->ultima_vez) > 7)
                  <tr>
                    <td>{{$dato->identificador}}</td>
                    <td>{{\Carbon\Carbon::now()->diffInDays($dato->ultima_vez)}}</td>
                    <td>{{$dato->lugares_name}}</td>
                    <td>
                          <a href="{{ route('transportaciones.detalles',$dato->transportacion) }}" class="btn btn-flat btn-primary">
                        {{$dato->transportacion->numero}} ->Ver detalles
                          </a>
                    </td>
                  </tr>
                  @endif
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

@push('styles')

@endpush

@push('scripts')

@endpush