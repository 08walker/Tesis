<div class="callout callout-info">
	<div class="container">
		<div class="row">
			<div class="col-12">
			<h3>Productos:</h3>
			</div>
			<div class="col-12">
		        <table id="example2" class="table table-bordered table-striped">
		            <thead>
		            <tr>
		              <th>Producto</th>
		              <th>Peso</th>
		              <th>Cantidad de bultos</th>
		              <th>Volumen</th>
		              <th>Observación</th>
		            </tr>
		            </thead>

		            <tbody>
		            @foreach($transferencia->transfenvprod as $todo)
		            <tr>
		              <td>{{$todo->producto->name}}</td>
		              <td>{{$todo->peso_kg}}</td>
		              <td>{{$todo->cantidad_bultos}}</td>
		              <td>{{$todo->volumen_m3}}</td>
		              <td>{{$todo->observacion}}</td>
		            </tr>
		            @endforeach
		            </tbody>
		        </table>
  			</div>
		</div>
	</div>
</div>