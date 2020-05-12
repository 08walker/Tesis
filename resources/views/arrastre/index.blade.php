@extends('admin.layout')

@section('meta-title','Tesis| Arrastres')
@section('meta-description','Listado de arrastres')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Listado de arrastres</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    @include('partials.success')

<div class="content">
          <div class="container">
            <div class="row">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Arrastres:</h3> 
              <br>
              <a href="{{route('arrastres.create')}}" type="button" class="btn btn-primary btn-flat" >
                  <i class="fa fa-plus"></i> Crear
              </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Identificador</th>
                  <th>Descipción</th>
                  <th>Tara</th>
                  <th>Volumen máx de carga</th>
                  <th>Peso máx de carga</th>
                  <!-- <th>Es propio</th> -->
                  <th>Equipo</th>
                  <th>Tipo arrastre</th>
                  <th>Tercero</th>
                  <th>Organización</th>
                  <th>Acciones</th>
                </tr>
                </thead>

                <tbody>
                @foreach($arrastres as $arrastre)
                <tr>
                  <td>{{$arrastre->id}}</td>
                  <td>{{$arrastre->identificador}}</td>
                  <td>{{$arrastre->description}}</td>
                  <td>{{$arrastre->tara}}</td>
                  <td>{{$arrastre->volumen_max_carga}}</td>
                  <td>{{$arrastre->peso_max_carga}}</td>
                  <!-- <td>{{$arrastre->es_propio}}</td> -->
                  <td>{{$arrastre->equipo->identificador}}</td>
                  <td>{{$arrastre->tipoArrastre->name}}</td>
                  <td>{{optional($arrastre->tercero)->name}}</td>
                  <td>{{optional($arrastre->organizacion)->name}}</td>
                  <td>
                      <a href="{{route('arrastres.show',$arrastre)}}" target="_blank">
                          <i class="fa fa-eye"></i>
                        </a>

                        <a href="{{route('arrastres.edit',$arrastre)}}" class="btn btn-xs btn-info">
                          <i class="fa fa-pen"></i>
                        </a>
                        <form method="POST" action="{{route('arrastres.destroy', $arrastre)}}" style="display: inline;">
                          {{csrf_field()}}{{method_field('DELETE')}}
                          <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estas seguro de que deseas elimiar el arrastre?')">
                            <i class="fa fa-times"></i>
                          </button>
                        </form>
                  
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
  </div>
</div>
</div>
</div>
</div>

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
</script>
@endpush
@endsection