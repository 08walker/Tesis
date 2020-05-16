@extends('admin.layout')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Actualizar equipo</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
          <div class="container">
            <div class="row">
                <!-- aling -->
                <div class="col-lg-2">
                  <div class="card"></div>
                </div>
                <div class="col-lg-8">
                <div class="card card-primary card-outline">
                  <div class="card-body">
                    
                    @include('partials.error-messages')
                    
                    <form method="POST" action="{{ route('equipos.update',$equipo) }}">
                    {{ method_field('PUT') }} {!! csrf_field() !!}
                    <div class="card-body">

                      <div class="row">
                      <div class="col-md-6">
                        @include('foreach.tercerofor',['model'=>$equipo])
                      </div>
                      <div class="col-md-6">
                        @include('foreach.organizacionfor',['model'=>$equipo])
                      </div>
                      <div class="col-md-6">
                        @include('componentes.chapa',['model'=>$equipo])
                      </div>
                      <div class="col-md-6">
                        @include('componentes.tara',['model'=>$equipo])
                      </div>
                      <div class="col-md-6">
                        @include('componentes.volumen',['model'=>$equipo])
                      </div>
                      <div class="col-md-6">
                        @include('componentes.peso',['model'=>$equipo])
                      </div>                      

                      <!-- puede_cargar -->
                        <div class="col-md-6 form-group">
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="customCheckbox2" checked name="">
                            <label for="customCheckbox2" class="custom-control-label">Puede Cargar:</label>
                          </div>                        
                        </div>
                        <div class="col-md-6">
                          @include('foreach.tipoequipofor',['model'=>$equipo])
                        </div>                      
                    </div>                    
                    @include('componentes.description',['model'=>$equipo])

                    <button type="submit" class="btn btn-success btn-flat">Actualizar</button>
                    <a class="btn btn-flat btn-primary" href="{{route('equipos')}}">Cancelar</a>
                    </div>
                </form>                
                </div>
                </div>
            </div>
            </div>
          </div>
    </div>
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