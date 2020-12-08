@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Recibir transferencia</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    @include('partials.success')
    @include('partials.demo')

    <div class="content">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
              	  <div class="card-header">
                  <div class="row">
                        <div class="col-6">
                          <label for="">Detalles de la transferencia:</label>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-3">
                          <p>Fecha de salida: <strong>{{\Carbon\Carbon::parse($transfEnviada->fyh_salida)->format('d/M/y')}}</strong></p>
                        </div>
                        <div class="col-3">
                          <p>Número de factura: <strong>{{$transfEnviada->num_fact}}</strong></p>
                        </div>
                        <div class="col-3">
                          <p>Origen: <strong>{{$transfEnviada->origen->name}}</strong></p>
                        </div>
                        <div class="col-3">
                          <p>Destino: <strong>{{$transfEnviada->destino->name}}</strong></p>
                        </div>
                        <div class="col-12">
                        <a href="{{route('incidencias.create',$transfEnviada->transportacion)}}" type="button" class="btn btn-primary btn-flat" >
                                <i class="fa fa-plus"></i> Reportar incidencia
                              </a>
                        </div>
                        
                        <div class="col-5">
                        <form id="quickForm" role="form" method="POST" action="{{ route('tenv.update.recibo',$transfEnviada) }}">
                        {{ method_field('PUT') }}{!! csrf_field() !!}
                            <div class="form-group">
                            <label for="exampleInputdate11">Fecha de llegada:</label>
                            <input type="date" class="form-control" name="fyh_llegada" 
                            value="old('fyh_llegada',$transfEnviada-> fyh_llegada ?$transfEnviada->fyh_llegada->format('d/m/y')):null">
                              <div class="has-error">
                                  @if($errors->has('fyh_llegada'))
                                    <font color="#FF0000">
                                          <span style="background-color: inherit;">
                                            {{$errors->first('fyh_llegada')}}
                                          </span>
                                    </font>
                                  @endif
                              </div>
                           </div>
                           <button type="submit" class="btn btn-success btn-flat">Recibir</button>
                           <a class="btn btn-flat btn-primary" href="{{route('home')}}">Cancelar</a>
                        </form>
                      </div>
                  </div>
                  </div>
                </div>
                  <div class="card-header">
                    <h3 class="card-title">Productos:</h3> 
                    <br>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    @include('componentes.calloutprod',['model'=>$transfEnviada])
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

@push('styles')
    <!-- DataTables -->
  <link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endpush

@push('scripts')

<!-- DataTables -->
<script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script src="/adminlte/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "language": {
        "search": "Buscar",
        "lengthMenu": "Ver _MENU_ entradas",
        "info": "Mostrando página _PAGE_ de _PAGES_",
        "emptyTable": "No hay datos para mostrar",
        "paginate": {
            "last": "Última página",
            "first": "Primera página",
            "next": "Siguiente",
            "previous": "Anterior",
          },
       },
    });
  });
</script>
</script>

@endpush