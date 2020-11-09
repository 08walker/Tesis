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
    @include('partials.errors')
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
                        <div class="col-6">
                        <a href="#" type="button" class="btn btn-primary btn-flat" >
                        <i class="fa fa-plus"></i> Crear 
                        </a>

                        <a href="#" type="button" class="btn btn-primary btn-flat" >
                        <i class="fa fa-plus"></i> Introducir hito 
                        </a>
                        </div>

                        <div class="col-6">
                        <a href="#" type="button" class="btn btn-success btn-flat" >
                        <i class="fa fa-plus"></i> Añadir transferencia enviada
                        </a>
    
                        <a href="#" type="button" class="btn btn-danger btn-flat" >
                        <i class="fa fa-plus"></i> Añadir transferencia recibida
                        </a>
                        </div>
                  </div>
                </div>
                <br><br>
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
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Settings</a>
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
                                <option value="{{$chofer->id}}"> {{$chofer->name}}</option>
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
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($transportacion->choferes as $chofer)
                    <tr>
                      <td>{{$chofer->id}}</td>
                      <td>{{$chofer->name}}</td>
                      <td><i class="fa fa-times">Quitar chofer</i></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                     texto numero 2
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                     texto numero 3
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                     texto numero 4
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
      lchofer:true
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
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush