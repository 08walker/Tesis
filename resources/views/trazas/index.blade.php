@extends('admin.layout')

@section('meta-title','Tesis| Trazas')
@section('meta-description','Listado de trazas')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Trazas del sistema</h1>
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
                    <h3 class="card-title">trazas:</h3> 
                    <br>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          {{-- <th>ID</th> --}}
                          <th>Fecha</th>
                          <th>Descripción</th>
                          <th>Accedió desde</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($trazas as $traza)
                          <tr>
                            {{-- <td>{{$traza->id}}</td> --}}
                            <td>{{$traza->created_at->format('d/M/Y H:i:s')}}</td>
                            <td>{{$traza->description}}</td>
                            <td>{{$traza->ip}}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
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