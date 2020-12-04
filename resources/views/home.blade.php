@extends('admin.layout')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Bienvenido {{auth()->user()->name}}</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @include('partials.success')
    @include('partials.demo')
    <!-- Main content -->
        <div class="content">
          <div class="container">
            <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Transferencias en curso</h5>
                <br>
                {{-- <button type="button" onload="ToastDemo()" class="btn btn-danger toastsDefaultDanger">
                  Launch Danger Toast
                </button>

                <button type="button" class="btn btn-danger toastsDangerAutohide">
                     Launch Default Toasts with autohide
                </button> --}}
              </div>
              <div class="card-body">
                @include('tablas.transferencias',['model'=>$tranferencias])
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection
@push('styles')
{{-- <!-- SweetAlert2 -->
  <link rel="stylesheet" href="/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="/adminlte/plugins/toastr/toastr.min.css"> --}}

    <!-- DataTables -->
  <link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endpush

@push('scripts')
{{-- 
<script src="/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="/adminlte/plugins/toastr/toastr.min.js"></script> --}}

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
{{-- <script>
$('.toastsDefaultDanger').click(function() {
      $(document).Toasts('create', {
        class: 'bg-danger', 
        title: 'Alerta de demora',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });

    $('.toastsDangerAutohide').click(function() {
      $(document).Toasts('create', {
        class: 'bg-danger', 
        title: 'Alerta de demora',
        autohide: true,
        delay: 3500,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
  </script> --}}
@endpush