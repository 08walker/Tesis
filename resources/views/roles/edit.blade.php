@extends('admin.layout')
@section('content')
<div class="col-md-6">
		<div class="card card-primary card-outline">
			<div class="card-header">
            	<h5 class="card-title">Actualizar Role </h5>
            </div>
            <div class="card-body">
			
			@include('admin.partials.error-messages')
	
	<form method="POST" action="{{route('admin.roles.update',$role)}}">
		 {{method_field('PUT')}}
		 @include('admin.roles.form')

            <button class="btn btn-primary btn-flat btn-block" type="submit">Actualizar role</button>
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