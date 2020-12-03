<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      {{-- <th>ID</th> --}}
      <th>Identificador</th>
      <th>Volumen max. de carga</th>
      <th>Tara</th>
      <th>Tercero</th>
      <th>Organización</th>
      @can('update',new \App\Envase)
        <th>Acciones</th>
      @endcan
    </tr>
  </thead>

  <tbody>
    @foreach($model as $envase)
    <tr>
      {{-- <td>{{$envase->id}}</td> --}}
      <td>{{$envase->identificador}}</td>
      <td>{{$envase->volumen_max_carga}}</td>
      <td>{{$envase->tara}}</td>
      <td>{{optional($envase->tercero)->name}}</td>
      <td>{{optional($envase->organizacion)->name}}</td>
      @can('update',new \App\Envase)
      <td>
        @if(!$envase->activo)
                      <form id="quickForm" role="form" method="POST" action="{{ route('envases.activar',$envase) }}">
                          {{ method_field('PUT') }} {!! csrf_field() !!}
                          <input type="hidden" value="1" name="activo">
                        <button class="btn btn-sm btn-primary" type="submit">
                          Activar
                        </button>
                      </form>
                    @else
            <a href="{{route('envases.edit',$envase)}}" class="btn btn-xs btn-info">
              <i class="fa fa-pen"></i>
            </a>
            @can('delete',new \App\Envase)
            <form method="POST" action="{{route('envases.destroy', $envase)}}" style="display: inline;">
              {{csrf_field()}}{{method_field('DELETE')}}
              <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estas seguro de que deseas elimiar el envase?')">
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