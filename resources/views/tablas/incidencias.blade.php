<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Descripción</th>
            <th>Tipo</th>
            <th>Transportación</th>
            @can('update',new \App\hito)
              <th>Acciones</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @foreach($incidencias as $hito)
            <tr>
                <td>{{\Carbon\Carbon::parse($hito->fyh_ini)->format('d/M/y')}}</td>
                <td>{{$hito->description}}</td>
                <td>{{$hito->tipoHito->name}}</td>
                <td>{{$hito->transportacion->numero}}</td>
                @can('update',new \App\hito)
                  <td>
                    <a href="{{route('incidencias.edit',$hito)}}" class="btn btn-xs btn-info">
                        <i class="fa fa-pen"></i>
                    </a>

                    @can('delete',new \App\hito)
                    <form method="POST" action="{{route('incidencias.destroy', $hito)}}" style="display: inline;">
                    {{csrf_field()}}{{method_field('DELETE')}}
                    <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estas seguro de que deseas elimiar la incidencia?')">
                    <i class="fa fa-times"></i>
                    </button>
                    </form>
                    @endcan
                  </td>
                @endcan
            </tr>
        @endforeach
    </tbody>
</table>