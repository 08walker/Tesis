<div class="callout callout-success">
	<div class="col-12">
		<div class="container">
			<div class="row">
  				<div class="col-sm-12">
        			<h3>Tranportación:</h3>
        		</div>
                <div class="col-sm-3">
                  <p>Identificador: <strong>{{$model->numero}}</strong></p>
                </div>
                <div class="col-sm-5">
                  <p>Observación: <strong>{{$model->observacion}}</strong></p>
                </div>
                <div class="col-sm-4">
                  <p>Equipo: <strong>{{$model->equipo->identificador}}</strong></p>
                </div>
        	</div>
            

            <div class="row">
                @if($model->chofertransp->count() > 0)
                <div class="col-sm-6">
                	<strong>Choferes:</strong>
                	<table id="example2" class="table table-bordered table-striped">
                	<thead>
                		<tr>
                			<th>Nombre</th>
                			<th>Apellidos</th>
                			<th>Carnet</th>
                			<th>Teléfono</th>
                		</tr>
                	</thead>
                	<tbody>
                  		@foreach($model->chofertransp as $chofer)
                		<tr>
                			<td>{{$chofer->choferes->name}}</td>
                			<td>{{$chofer->choferes->apellido}}</td>
                			<td>{{$chofer->choferes->ci}}</td>
                			<td>{{$chofer->choferes->telefono}}</td>
                		</tr>
                		@endforeach
                	</tbody>
                	</table>
            	</div>
                @endif

                @if($model->arrastretrasnp->count() > 0)
                <div class="col-sm-6">
                	<strong>Arrastres:</strong>
                	<table id="example2" class="table table-bordered table-striped">
                	<thead>
                		<tr>
                			<th>Identificador</th>
                			<th>Descripción</th>
                		</tr>
                	</thead>
                	<tbody>
                  		@foreach($model->arrastretrasnp as $arrastre)
                		<tr>
                			<td>{{$arrastre->arrastres->identificador}}</td>
                			<td>{{$arrastre->arrastres->description}}</td>
                		</tr>
                		@endforeach
                	</tbody>
                	</table>
                </div>
                @endif
        	</div>

            @if($model->arrastretrasnp->count() > 0)
            <div class="col-sm-6">
            	<strong>Envases:</strong>
            	<table id="example2" class="table table-bordered table-striped">
                	<thead>
                		<tr>
                			<th>Identificador</th>
                		</tr>
                	</thead>
                	<tbody>
                  		@foreach($model->arrastretrasnp as $arras)
                      		@foreach($arras->arrastenva as $dat)
                        		<tr>
                        			<td>{{$dat->envase->identificador}}</td>
                        		</tr>
                    		@endforeach
                		@endforeach
                	</tbody>
            	</table>
            </div>
            @endif
        </div>
    </div>
</div>