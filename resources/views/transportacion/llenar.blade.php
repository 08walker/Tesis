@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Crear transportaciones</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    @include('partials.success')
    
    <div class="content">
        <div class="container">
            <div class="row">
              <div class="col-lg-1">
                <div class="card">
                </div>
              </div>
              <div class="col-lg-10">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <div class="row">
                        <div class="col-3">
                          <p>Identificador: <strong>{{$transportacion->numero}}</strong></p>
                        </div>
                        <div class="col-5">
                          <p>Observación: <strong>{{$transportacion->observacion}}</strong></p>
                        </div>
                        <div class="col-4">
                          <p>Equipos: <strong>{{$transportacion->equipo->identificador}}</strong></p>
                        </div>
                  </div>
                      <div class="content">
                          <a href="{{route('transportaciones.edit',$transportacion)}}" type="button" class="btn btn-primary btn-flat" >
                            <i class="fa fa-pen"></i> Editar detalles
                          </a>
                          {{-- @if($transportacion->transfenv) --}}
                          <a href="{{route('transportaciones.incidencia',$transportacion)}}" type="button" class="btn btn-primary btn-flat" >
                            <i class="fa fa-plus"></i> Reportar incidencia
                          </a>
                          {{-- @endif --}}
                          <a href="{{route('tenv',$transportacion)}}" type="button" class="btn btn-primary btn-flat" >
                             Transferencias
                          </a>
                      </div>
                  </div>
                </div>
                <!----------------------------->
                <div class="content">
                  <div class="container">
                <div class="card card-primary card-outline card-tabs">
              <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Choferes</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Arrastre</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Envases</a>
                  </li>
                </ul>
              </div>
              
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                
                    <form id="quickForm" role="form" method="POST" action="{{ route('transportaciones.choferes',$transportacion) }}">
                    {!! csrf_field() !!}
                     <div class="form-group">
                      <div class="col-6">
                        <label>Choferes:</label>
                        <select class="select2" multiple="multiple" name="lchofer[]" data-placeholder="Seleccione los choferes" style="width: 100%;">
                          @foreach($choferes->all() as $chofer)
                            <option 
                              {{ collect(old('lchofer', $transportacion->choferes->pluck('id')))->contains($chofer->id) ? 'selected':'' }}
                              value="{{$chofer->id}}">
                              {{$chofer->name}}
                            </option>
                          @endforeach   
                        </select>
                        <div class="has-error">
                          @if($errors->has('definir esto'))
                              <span id="helpBlock2" class="help-block">{{$errors->first('definir esto')}}</span>
                            @endif
                        </div>
                      </div>      
                     </div>
                    <button type="submit" class="btn btn-success btn-flat">Añadir</button>
                    <br>
                    <br>
                    </form>
                    <div class="content">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Nombre y Apellidos</th>
                            <th>Telefono</th>
                            <th>Carnet de identidad</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($transportacion->choferes as $chofer)
                          <tr>
                            <td>{{$chofer->name}} {{$chofer->apellido}}</td>
                            <td>{{$chofer->telefono}}</td>
                            <td>{{$chofer->ci}}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>

                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                     
                     <form id="quickForm" role="form" method="POST" action="{{ route('transportaciones.arrastres',$transportacion) }}">
                    {!! csrf_field() !!}
                     <div class="form-group">
                      <div class="col-6">
                        <label>Arrastres:</label>

                        <select class="select2" multiple="multiple" name="larrastre[]" data-placeholder="Seleccione los arrastres" style="width: 100%;">
                          @foreach($arrastres->all() as $arrastre)
                            <option 
                              {{-- {{ collect(old('larrastre', $transportacion->arrastres->pluck('id')))->contains($arrastre->id) ? 'selected':'' }} --}}
                              value="{{$arrastre->id}}">
                              {{$arrastre->identificador}}
                            </option>
                          @endforeach
                        </select>
                        <div class="has-error">
                          @if($errors->has('definir esto'))
                              <span id="helpBlock2" class="help-block">{{$errors->first('definir esto')}}</span>
                            @endif
                        </div>
                      </div>      
                     </div>
                    <button type="submit" class="btn btn-success btn-flat">Añadir</button>
                    <br>
                    <br>
                    </form>
                    <div class="content">
                      <table id="example2" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Identificador</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($tarras as $arrast)
                          <tr>
                            <td>{{$arrast->arrastres->identificador}}</td>
                            <td>{{$arrast->arrastres->description}}</td>
                            <td>
                              <button type="button" class="btn btn-flat btn-danger" >
                                      <i class="fa fa-times"></i> Quitar
                             </button>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>

                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                    @if($tarras->count()>0)
                    <button type="button" class="btn btn-flat btn-primary" data-toggle="modal" data-target="#modal-default">
                        <i class="fa fa-plus"></i> Añadir Envase
                    </button>
                    @endif

                    <br><br>

                     <div class="content">
                      <table id="example3" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Ident. Arrastre</th>
                            <th>Ident. Envase</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($tarras as $arra)
                            @foreach($arra->arrastenva as $dat)
                              <tr>
                                <td>{{$dat->id}}</td>
                                <td>{{$arra->arrastres->identificador}}</td>
                                <td>{{$dat->envase->identificador}}</td>
                                <td>
                                  <form method="POST" action="{{route('arrastreenvase.destroy', $dat)}}" style="display: inline;">
                                    {{csrf_field()}}{{method_field('DELETE')}}
                                    <button class="btn btn-flat btn-danger" onclick="return confirm('¿Estas seguro de que deseas quitar el arrastre?')">
                                      <i class="fa fa-times"></i> Quitar
                                    </button>
                                  </form>
                                </td>
                              </tr>
                            @endforeach
                          @endforeach
                        </tbody>
                      </table>
                    </div>  

                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
            </div>
            </div>
                <!------------------------------>
              </div>
            </div></div>
        </div>
    </div>

</div>

@if($tarras->count()>0)
    <div class="modal fade" id="modal-default">
      <form id="quickForm" role="form" method="POST" 
          action="{{ route('transportaciones.envases',$arrast) }}">
              {!! csrf_field() !!}
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Añadir Envase</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Seleccione el arrastre:</label>
                <select class="form-control select2" style="width: 100%;" name="arrast_transp_id">
                  @foreach($tarras as $add)
                        <option value="{{$add->id}}">{{$add->arrastres->identificador}}</option>
                  @endforeach                  
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Seleccione el envase:</label>
                <select class="form-control select2" style="width: 100%;" name="envase_id">
                  @foreach($envases->all() as $envase)
                        <option value="{{$envase->id}}">{{$envase->identificador}}</option>
                  @endforeach                  
                </select>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-success">Añadir</button>
              <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        </form>
      </div>
      <!-- /.modal -->
@endif

@endsection

@push('styles')

<!-- Select2 -->
  <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- DataTables -->
  <link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endpush

@push('scripts')
  <!-- Select2 -->
  <script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
  <!-- jquery-validation -->
  <script src="/adminlte/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="/adminlte/plugins/jquery-validation/additional-methods.min.js"></script>

<!-- DataTables -->
<script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
    $(function () {

    //Initialize Select2 Elements
    $('.select2').select2({
      lchofer:true,
      larrastre:true
    })

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>

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
    $("#example2").DataTable({
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
    $("#example3").DataTable({
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
@endpush