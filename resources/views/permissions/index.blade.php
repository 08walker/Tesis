@extends('admin.layout')

@section('meta-title','Tesis| Permisos')
@section('meta-description','Listado de Permisos')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Listado de permisos</h1>
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
              <h3 class="card-title">Permisos:</h3> 
              <br>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
           <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  {{-- <th>ID</th> --}}
                  <th>Identificador</th>
                  <th>Nombre</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                
                <tbody>
                  @foreach($permissions as $permission)
                    <tr>
                      {{-- <td>{{$permission->id}}</td> --}}
                      <td>{{$permission->name}}</td>
                      <td>{{$permission->display_name}}</td>
                      <td>
                      @can('update',$permission) 
                          <a href="{{route('admin.permissions.edit',$permission)}}" class="btn btn-xs btn-info">
                            <i class="fa fa-pen"></i>
                          </a>
                      @endcan
                      </td>
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
@include('tablas.estilos')