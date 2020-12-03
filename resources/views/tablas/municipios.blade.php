<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      {{-- <th>ID</th> --}}
      <th>Provincia</th>
      <th>Nombre</th>

      @can('update',new \App\Municipio)
      <th>Acciones</th>
      @endcan

    </tr>
    </thead>

    <tbody>
    @foreach($municipios as $municipio)
    <tr>
      {{-- <td>{{$municipio->id}}</td> --}}
      <td>{{$municipio->provincia->name}}</td>
      <td>{{$municipio->name}}</td>
      @can('update',new \App\Municipio)
      <td>
        @if(!$municipio->activo)
                      <form id="quickForm" role="form" method="POST" action="{{ route('municipios.activar',$municipio) }}">
                          {{ method_field('PUT') }} {!! csrf_field() !!}
                          <input type="hidden" value="1" name="activo">
                        <button class="btn btn-sm btn-primary" type="submit">
                          Activar
                        </button>
                      </form>
                    @else
            <a href="{{route('municipios.edit',$municipio)}}" class="btn btn-xs btn-info">
              <i class="fa fa-pen"></i>
            </a>
            
            @can('delete',new \App\Municipio)
            <form method="POST" action="{{route('municipios.destroy', $municipio)}}" style="display: inline;">
              {{csrf_field()}}{{method_field('DELETE')}}
              <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estas seguro de que deseas elimiar el municipio?')">
                <i class="fa fa-times"></i>
              </button>
            </form>
            @endcan
            @endif
      </td>
      @endcan
    </tr>
    @endforeach
    </tbody>
</table>