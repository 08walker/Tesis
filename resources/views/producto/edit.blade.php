@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Actualizar Producto</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

        <!-- Main content -->
        <div class="content">
          <div class="container">
            <div class="row">
    
                <!-- aling -->
                <div class="col-lg-3">
                  <div class="card"></div>
                </div>
                <!-- end aling -->
          <div class="col-lg-6">
            <div class="card card-primary card-outline">
              <div class="card-body">

                @include('partials.error-messages')
                
                <form method="POST" action="{{ route('productos.update',$producto) }}">
                    {{ method_field('PUT') }}{!! csrf_field() !!}
                <div class="card-body">
                                    
                  <div class="row">
                    <div class="col-md-6">
                     @include('componentes.name',['model'=>$producto])
                    </div>
                    <div class="col-md-6">
                     @include('componentes.identificador',['model'=>$producto])      
                    </div>
                    <div class="col-md-12">
                     @include('foreach.unidadmedidafor',['model'=>$producto])
                    </div>
                  </div>
                  @include('componentes.description',['model'=>$producto])

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

@push('styles')

<!-- Select2 -->
  <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

@endpush

@push('scripts')
  <!-- Select2 -->
  <script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>

<script>
    $(function () {

    //Initialize Select2 Elements
    $('.select2').select2({
      //tags:true
    });

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });

  });

</script>
@endpush