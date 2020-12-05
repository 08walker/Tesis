@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Listado de Reportes</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


 <div class="content">
    <div class="container">
     <div class="row">
        <div class="col-lg-2">
            <div class="card">
            </div>
        </div>
        <div class="col-lg-8">
          <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Reportes:</h3> 
                <br>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <p><b>Reporte #1&nbsp;</b>&nbsp;&nbsp; <a href="{{ route('reportes.reporte1') }}">Productos y cantidades transferidos en el periodo seleccionado.</a><br>
              <b>Reporte #2&nbsp;</b>&nbsp;&nbsp; <a href="{{ route('reportes.reporte2') }}">Transportaciones por chofer que facilite la facturación del pago del servicio.</a><br>
              <b>Reporte #3&nbsp;</b>&nbsp;&nbsp; <a href="{{ route('reportes.reporte3') }}">Comportamiento de la utilización de contenedores de la empresa.</a><br>
              <b>Reporte #4&nbsp;</b>&nbsp;&nbsp; <a href="{{ route('reportes.reporte4') }}">Comportamiento del costo de contenedores de la empresa.</a><br>
              <b>Reporte #5&nbsp;&nbsp;</b>&nbsp; <a href="{{ route('reportes.reporte5') }}">Ubicación de contenedores propios.</a><br>
              <b>Reporte #6</b>&nbsp;&nbsp;&nbsp; <a href="{{ route('reportes.reporte6') }}">Comportamiento de la utilización de equipos de la empresa.</a><br>
              {{-- <b>Reporte #7&nbsp;&nbsp;</b>&nbsp; Análisis estadístico del cumplimiento del plan de transportaciones por organización.<br> --}}
              <b>Reporte #7</b>&nbsp;&nbsp;&nbsp; <a href="{{ route('reportes.reporte7') }}">Generar reporte con los contenedores que llevan más de 7 días sin utilizarse.</a><br>
              <b>Seleccione la opción para optener las transportaciones:</b><br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
              <b>Reporte #8</b>&nbsp;&nbsp;<a href="{{ route('reportes.reporte8') }}">Chofer.</a><br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
              {{-- Periodo (día, semana, mes, año).<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  --}}
              <b>Reporte #9</b>&nbsp;&nbsp;<a href="{{ route('reportes.reporte9') }}">Contenedor.</a><br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
              <b>Reporte #10</b>&nbsp;&nbsp;<a href="{{ route('reportes.reporte10') }}">Equipo.</a><br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
              <b>Reporte #11</b>&nbsp;&nbsp;<a href="{{ route('reportes.reporte11') }}">Organización.</a><br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
              <b>Reporte #12</b>&nbsp;&nbsp;<a href="{{ route('reportes.reporte12') }}">Producto.</a><br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
              <b>Reporte #13</b>&nbsp;&nbsp;<a href="{{ route('reportes.reporte13') }}">Lugar (almacenes, principalmente donde se recibe la rama de tabaco).</a><br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
              <b>Reporte #14</b>&nbsp;&nbsp;<a href="{{ route('reportes.reporte14') }}">Última ubicación contenedor.</a><br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
              <b>Reporte #15</b>&nbsp;&nbsp;<a href="{{ route('reportes.reporte15') }}">Última ubicación equipo.</a><br></p>
              </div>
              <!-- /.card-body -->
          </div>
            <!-- /.card -->
          </div>
      </div>
    </div>
  </div>
</div>
@endsection