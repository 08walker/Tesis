<table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        {{-- <th>ID</th> --}}
        <th>Usuario:</th>
        <th>Cargo</th>
        <th>Organización</th>
        @can('update',new \App\Directivo)
          <th>Acciones</th>
        @endcan
      </tr>
    </thead>

    <tbody>
      @foreach($model as $jefe)
        <tr>
          {{-- <td>{{$jefe->id}}</td> --}}
          <td>{{$jefe->user->name}}</td>
          <td>{{$jefe->name}}</td>
          <td>{{$jefe->organizacion->name}}</td>
          @can('update',new \App\Directivo)
            <td>
              @if(!$jefe->activo)
                      <form id="quickForm" role="form" method="POST" action="{{ route('directivo.activar',$jefe) }}">
                          {{ method_field('PUT') }} {!! csrf_field() !!}
                          <input type="hidden" value="1" name="activo">
                        <button class="btn btn-sm btn-primary" type="submit">
                          Activar
                        </button>
                      </form>
                    @else
                  <a href="{{route('directivo.edit',$jefe)}}" class="btn btn-xs btn-info">
                    <i class="fa fa-pen"></i>
                  </a>

                  @can('delete',new \App\Directivo)
                  <form method="POST" action="{{route('directivo.destroy', $jefe)}}" style="display: inline;">
                    {{csrf_field()}}{{method_field('DELETE')}}
                    <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estas seguro de que deseas elimiar el directivo?')">
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