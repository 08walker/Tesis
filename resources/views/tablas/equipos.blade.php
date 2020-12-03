<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      {{-- <th>ID</th> --}}
      <th>Chapa</th>
      <th>Descripción</th>
      <th>Tara</th>
      <th>Volumen máx de carga</th>
      <th>Peso máx de carga</th>
      <th>Tipo</th>
      <th>Agencia</th>
      <th>Organización</th>
      @can('update',new \App\Equipo)
        <th>Acciones</th>
      @endcan
    </tr>
    </thead>

    <tbody>
    @foreach($equipos as $equipo)
    <tr>
      {{-- <td>{{$equipo->id}}</td> --}}
      <td>{{$equipo->identificador}}</td>
      <td>{{$equipo->description}}</td>
      <td>{{$equipo->tara}}</td>
      <td>{{$equipo->volumen_max_carga}}</td>
      <td>{{$equipo->peso_max_carga}}</td>
      <td>{{$equipo->tipoEquipo->name}}</td>
      <td>{{optional($equipo->tercero)->name}}</td>
      <td>{{optional($equipo->organizacion)->name}}</td>
      @can('update',new \App\Equipo)
      <td>
        @if(!$equipo->activo)
          <form id="quickForm" role="form" method="POST" action="{{ route('equipos.activar',$equipo) }}">
              {{ method_field('PUT') }} {!! csrf_field() !!}
              <input type="hidden" value="1" name="activo">
            <button class="btn btn-sm btn-primary" type="submit">
              Activar
            </button>
          </form>
        @else
            <a href="{{route('equipos.edit',$equipo)}}" class="btn btn-xs btn-info">
              <i class="fa fa-pen"></i>
            </a>
            @can('delete',new \App\Equipo)
            <form method="POST" action="{{route('equipos.destroy', $equipo)}}" style="display: inline;">
              {{csrf_field()}}{{method_field('DELETE')}}
              <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estas seguro de que deseas elimiar el equipo?')">
                <i class="fa fa-times"></i>
              </button>
            </form>
            @endcan
            @endcan
      </td>
      @endcan
    </tr>
    @endforeach
    </tbody>
</table>