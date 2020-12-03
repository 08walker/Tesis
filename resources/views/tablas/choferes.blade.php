<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
          {{-- <th>ID</th> --}}
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Carnet de identidad</th>
          <th>licencia</th>
          <th>teléfono</th>
          <th>Equipo</th>
          <th>Tercero</th>
          <th>Organización</th>
          @can('update',new \App\Chofer)
            <th>Acciones</th>
          @endcan
        </tr>
    </thead>

    <tbody>
        @foreach($model as $chofer)
            <tr>
                {{-- <td>{{$chofer->id}}</td> --}}
                <td>{{$chofer->name}}</td>
                <td>{{$chofer->apellido}}</td>
                <td>{{$chofer->ci}}</td>
                <td>{{$chofer->licencia}}</td>
                <td>{{$chofer->telefono}}</td>
                <td>{{$chofer->equipo->identificador}}</td>
                <td>{{optional($chofer->tercero)->name}}</td>
                <td>{{optional($chofer->organizacion)->name}}</td>
                @can('update',new \App\Chofer)
                  <td>
                    @if(!$chofer->activo)
                      <form id="quickForm" role="form" method="POST" action="{{ route('choferes.activar',$chofer) }}">
                          {{ method_field('PUT') }} {!! csrf_field() !!}
                          <input type="hidden" value="1" name="activo">
                        <button class="btn btn-sm btn-primary" type="submit">
                          Activar
                        </button>
                      </form>
                    @else
                      <a href="{{route('choferes.edit',$chofer)}}" class="btn btn-xs btn-info">
                        <i class="fa fa-pen"></i>
                      </a>
                      
                      @can('delete',new \App\Chofer)
                        <form method="POST" action="{{route('choferes.destroy', $chofer)}}" style="display: inline;">
                          {{csrf_field()}}{{method_field('DELETE')}}
                          <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estas seguro de que deseas elimiar el chofer?')">
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