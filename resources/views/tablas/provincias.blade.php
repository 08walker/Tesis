<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      {{-- <th>ID</th> --}}
      <th>Nombre</th>
      @can('update',new \App\Provincia)
      <th>Acciones</th>
      @endcan
    </tr>
    </thead>
    <tbody>
    @foreach($model as $provincia)
    <tr>
      {{-- <td>{{$provincia->id}}</td> --}}
      <td>{{$provincia->name}}</td>
      @can('update',new \App\Provincia)
      <td>
        @if(!$provincia->activo)
                      <form id="quickForm" role="form" method="POST" action="{{ route('provincias.activar',$provincia) }}">
                          {{ method_field('PUT') }} {!! csrf_field() !!}
                          <input type="hidden" value="1" name="activo">
                        <button class="btn btn-sm btn-primary" type="submit">
                          Activar
                        </button>
                      </form>
                    @else
            <a href="{{route('provincias.edit',$provincia)}}" class="btn btn-xs btn-info">
              <i class="fa fa-pen"></i>
            </a>
            @can('delete',new \App\Provincia)
            <form method="POST" action="{{route('provincias.destroy', $provincia)}}" style="display: inline;">
              {{csrf_field()}}{{method_field('DELETE')}}
              <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estas seguro de que deseas elimiar la provincia?')">
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