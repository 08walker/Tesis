<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      {{-- <th>ID</th> --}}
      <th>Nombre</th>
      <th>Municipio</th>
      <th>Tercero</th>
      <th>Organización</th>
      @can('update',new \App\Lugar)
      <th>Acciones</th>
      @endcan
    </tr>
    </thead>

    <tbody>
    @foreach($model as $lugar)
    <tr>
      {{-- <td>{{$lugar->id}}</td> --}}
      <td>{{$lugar->name}}</td>
      <td>{{$lugar->municipio->name}}</td>
      <td>{{optional($lugar->tercero)->name}}</td>
      <td>{{optional($lugar->organizacion)->name}}</td>
      
      @can('update',new \App\Lugar)
      <td>
        @if(!$lugar->activo)
          <form id="quickForm" role="form" method="POST" action="{{ route('lugares.activar',$lugar) }}">
              {{ method_field('PUT') }} {!! csrf_field() !!}
              <input type="hidden" value="1" name="activo">
            <button class="btn btn-sm btn-primary" type="submit">
              Activar
            </button>
          </form>
        @else
            <a href="{{route('lugares.edit',$lugar)}}" class="btn btn-xs btn-info">
              <i class="fa fa-pen"></i>
            </a>
            @can('delete',new \App\Lugar)
            <form method="POST" action="{{route('lugares.destroy', $lugar)}}" style="display: inline;">
              {{csrf_field()}}{{method_field('DELETE')}}
              <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estas seguro de que deseas elimiar el lugar?')">
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