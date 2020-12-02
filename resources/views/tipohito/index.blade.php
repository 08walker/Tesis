@extends('admin.layout')

@section('meta-title','Tesis| Tipo de Incidencia')
@section('meta-description','Listado de tipos de incidencias')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Listado de tipos de incidencias</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

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
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                  </tr>
                  </thead>

                  <tbody>
                  @foreach($tipohito as $tipo)
                  <tr>
                    <td>{{$tipo->name}}</td>
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