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
                @if($errors->any())
                <div class="alert alert-danger">
                <p>Por favor corrige los errores debajo:</p> 
                </div>
                @endif
                
                <form method="POST" action="{{ route('productos.update',$producto) }}">
                    {{ method_field('PUT') }}{!! csrf_field() !!}
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre:</label>
                    <input autofocus="" type="text" class="form-control" name="name" id="exampleInputPassword1" placeholder="Escriba el nombre" value="{{$producto->name,old('name')}}">
                        <div class="has-error">
                                @if($errors->has('name'))
                                    <span id="helpBlock2" class="help-block">{{$errors->first('name')}}</span> 
                                @endif
                        </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Identificador:</label>
                    <input autofocus="" type="text" class="form-control" name="identificador" id="exampleInputPassword1" placeholder="Escriba el identificador" value="{{$producto->identificador,old('identificador')}}">
                        <div class="has-error">
                                @if($errors->has('identificador'))
                                    <span id="helpBlock2" class="help-block">{{$errors->first('identificador')}}</span> 
                                @endif
                        </div>
                  </div>

                  @include('foreach.unidadmedidafor')

                  <div class="form-group">
                    <label>Descripción</label>
                    <textarea class="form-control" name="description" rows="2" >{{$producto->description}}</textarea>
                  </div>
                  <div class="form-group has-error">
                                @if($errors->has('description'))
                                    <span id="helpBlock2" class="help-block">{{$errors->first('description')}}</span> 
                                @endif
                        </div>
                <button type="submit" class="btn btn-success btn-flat">Crear</button>
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