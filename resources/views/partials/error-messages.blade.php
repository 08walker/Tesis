@if($errors->any())
	<div class="alert alert-danger">
		<p>Por favor corrige los errores debajo:</p> 
		{{-- @foreach($errors->all() as $error)
			<p>{{$error}}</p>
		@endforeach --}}
	</div>
@endif