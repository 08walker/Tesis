@extends('admin.layout')
@section('content')
<div class="col-md-6">
    <div class="card card-primary card-outline">
      <div class="card-header">
              <h5 class="card-title">Actualizar permiso </h5>
            </div>
            <div class="card-body">
      
      @include('admin.partials.error-messages')
  
  <form method="POST" action="{{route('admin.permissions.update',$permission)}}">
     {{method_field('PUT')}}{{ csrf_field() }}

      <div class="form-group">
         <label >Identificador:</label>
         <input type="text" class="form-control" value="{{$permission->name}}" disabled="">
      </div>
      <div class="form-group">
         <label for="display_name">Nombre:</label>
         <input type="text" autofocus="" class="form-control" name="display_name" value="{{old('display_name',$permission->display_name)}}">
      </div>

            <button class="btn btn-primary btn-flat btn-block" type="submit">Actualizar permiso</button>
  </form>
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
      tags:true
    })

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })    

  })

</script>
@endpush  