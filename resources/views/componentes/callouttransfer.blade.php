<div class="callout callout-info">
  <div class="container">
  	<div class="row">
  		<div class="col-12">
    		<h3>Tranferencia:</h3>
    	</div>
    	<div class="col-4">
            <p>Fecha de salida: <strong>{{\Carbon\Carbon::parse($model->fyh_salida)->format('d/M/y')}}</strong></p>
          </div>
          @if($model->fyh_llegada)
          <div class="col-4">
            <p>Fecha de llegada: <strong>{{\Carbon\Carbon::parse($model->fyh_llegada)->format('d/M/y')}}</strong></p>
          </div>
          @endif
          <div class="col-4">
            <p>Número de factura: <strong>{{$model->num_fact}}</strong></p>
          </div>
          <div class="col-4">
            <p>Origen: <strong>{{$model->origen->name}}</strong></p>
          </div>
          <div class="col-4">
            <p>Destino: <strong>{{$model->destino->name}}</strong></p>
          </div>
     </div>
  </div>
</div>