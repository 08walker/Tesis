@extends('admin.layout')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Actualizar lugar</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
          <div class="container">
            <div class="row">
                <!-- aling -->
                <div class="col-lg-3">
                  <div class="card"></div>
                </div>
                <div class="col-lg-6">
                <div class="card card-primary card-outline">
                  <div class="card-body">
                    @if($errors->any())
                    <div class="alert alert-danger">
                    <p>Por favor corrige los errores debajo:</p> 
                    </div>
                    @endif
                    
                    <form method="POST" action="{{ route('lugares.update',$lugar) }}">
                        {{ method_field('PUT') }} {!! csrf_field() !!}
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nombre:</label>
                        <input autofocus="" type="text" class="form-control" name="name" id="exampleInputPassword1" placeholder="Escriba el nombre" value="{{$lugar->name, old('name')}}">
                      <div class="has-error">
                            @if($errors->has('name'))
                            <span id="helpBlock2" class="help-block">{{$errors->first('name')}}</span>
                            @endif
                      </div>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Municipio:</label>
                        <select class="form-control select2" style="width: 100%;" name="municipio_id">
                            @foreach($municipios->all() as $munic)
                                @if($munic->id == $lugar->municipio_id)
                                    <option value="{{$munic->id}}">{{$munic->name}}</option>
                                    @else                                 
                                    <option value="{{$munic->id}}">{{$munic->name}}</option>
                                    @endif
                            @endforeach
                      </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Tercero:</label>
                        <select class="form-control select2" style="width: 100%;" name="tercero_id">
                            @foreach($terceros->all() as $tercero)
                                @if($tercero->id == $lugar->tercero_id)
                                    <option value="{{$tercero->id}}">{{$tercero->name}}</option>
                                    @else                                 
                                    <option value="{{$tercero->id}}">{{$tercero->name}}</option>
                                    @endif
                            @endforeach
                        </select>

                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Organización:</label>
                        <select class="form-control select2" style="width: 100%;" name="organizacion_id">
                            @foreach($organizaciones->all() as $org)
                                @if($org->id == $lugar->organizacion_id)
                                    <option value="{{$org->id}}">{{$org->name}}</option>
                                    @else                                 
                                    <option value="{{$org->id}}">{{$org->name}}</option>
                                    @endif
                            @endforeach
                      </select>
                      
                      <div class="has-error">
                            @if($errors->has('organizacion_id'))
                            <span id="helpBlock2" class="help-block">{{$errors->first('organizacion_id')}}</span>
                            @endif
                      </div>
                      </div>

                    <button type="submit" class="btn btn-success btn-flat">Actualizar</button>
                    <a class="btn btn-flat btn-primary" href="{{route('lugares')}}">Cancelar</a>
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