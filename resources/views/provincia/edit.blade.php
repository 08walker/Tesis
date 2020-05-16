@extends('admin.layout')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Actualizar provincia</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

        <!-- Main content -->
        <div class="content">
          <div class="container">
            <div class="row">
                <div class="col-lg-3">
            <div class="card">
            </div>
        </div>
          <div class="col-lg-6">
            <div class="card card-primary card-outline">
              <div class="card-body">
                @if($errors->any())
                <div class="alert alert-danger">
                <p>Por favor corrige los errores debajo:</p> 
                </div>
                @endif
                
                <form method="POST" action="{{ route('provincias.update',$provincia) }}">
                {{ method_field('PUT') }}
                {!! csrf_field() !!}
                <div class="card-body">

                  @include('componentes.name',['model'=>$provincia])
                
                <button type="submit" class="btn btn-success btn-flat">Actualizar</button>
                <a class="btn btn-flat btn-primary" href="{{route('provincias')}}">Cancelar</a>
                </div>
            </form>                
            
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection