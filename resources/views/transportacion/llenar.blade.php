@extends('admin.layout')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Crear transportacion</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
          <div class="container">
            <div class="row">
                <!-- aling -->
                <div class="col-lg-12">
                <div class="card card-primary card-outline">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-3">
                        <p>Identidicador:B64646</p>
                      </div>
                      <div class="col-5">
                        <p>Observacion:Cras lacinia erat eget sapien porta consectetur.</p>
                      </div>
                      <div class="col-4">
                        <p>Equipos:B484128</p>
                      </div>
                    </div>                    
            
            <div class="col-12 col-sm-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Chofer</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Arrastre</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Envase</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Settings</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                     <div class="row">

                     <div class="form-group">
                      <div class="col-12">
                        <label for="exampleInputEquipoId1">Chofer encargado:</label>
                        <select class="form-control select2" style="width: 100%;" name="definir esto">
                              <option value="">
                                --------------------Seleccione el choferes--------------------
                              </option>
                              <option value="">Marcos</option>
                              <option value="">Ramon</option>
                              <option value="">Filiberto</option>
                              <option value="">Antonio</option>
                              <option value="">Osvaldo</option>
                          </select>
                          </div>
                      <div class="has-error">
                        @if($errors->has('definir esto'))
                            <span id="helpBlock2" class="help-block">{{$errors->first('definir esto')}}</span>
                          @endif
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-12">
                        <label>Otros Choferes:</label>
                        <select class="select2" multiple="multiple" name="otros[]" data-placeholder="Seleccione otros choferes" style="width: 100%;">
                          <option >Marcos</option>
                          <option >Ramon</option>
                          <option >Filiberto</option>
                          <option >Antonio</option>
                          <option >Osvaldo</option>
                        </select>
                      <div class="has-error">
                        @if($errors->has('definir esto'))
                            <span id="helpBlock2" class="help-block">{{$errors->first('definir esto')}}</span>
                          @endif
                      </div>
                    </div>      
                      </div>
                    </div>

                    <button type="submit" class="btn btn-success btn-flat">Añadir</button>
          <br><br>

                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Quitar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Manuel</td>
                            <td>No</td>
                            <td><i class="fa fa-times"></i></td>
                        </tr>
                    </tbody>
                  </table>
                    </div>
                    
                  <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                     <div class="form-group">
                      <div class="col-6">
                        <label>Selecciones los arrastres:</label>
                        <select class="select2" multiple="multiple" name="otros[]" data-placeholder="Seleccione" style="width: 100%;">
                          <option>B123456</option>
                          <option>B357895</option>
                          <option>B468254</option>
                          <option>B874563</option>
                          <option>B126587</option>
                        </select>
                      <div class="has-error">
                        @if($errors->has('definir esto'))
                            <span id="helpBlock2" class="help-block">{{$errors->first('definir esto')}}</span>
                          @endif
                      </div>
                    </div>      
                      </div>

                      <button type="submit" class="btn btn-success btn-flat">Añadir</button>
                    <br><br>

                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>ID</th>
                          <th>Chapa</th>
                          <th>Quitar</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>B258647</td>
                            <td><i class="fa fa-times"></i></td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>B256347</td>
                          <td><i class="fa fa-times"></i></td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>B212647</td>
                          <td><i class="fa fa-times"></i></td>
                        </tr>
                    </tbody>
                  </table>

                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                     Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna. 
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                     Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis. 
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        

                  </div>
                </form>                
                </div>
                </div>
            </div>
            </div>
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
      tags:true
    })

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>

<script type="text/javascript">
$(document).ready(function () {
   $('#quickForm').validate({
    rules: {
      name: {
        required: true,
        minlength: 5,
      },
      identificador: {
        required: true,
        minlength: 5,
      },
      municipio_id: {
        required: true
      },
    },
    messages: {
      name: {
        required: "Debe introducir el nombre",
        minlength: "El nombre debe tener 5 caracteres como mínimo"
      },
      identificador: {
        required: "Debe introducir el identificador",
        minlength: "El identificador debe tener 5 caracteres como mínimo"
      },
      municipio_id: {
        required: "Por favor seleccione el municipio",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
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