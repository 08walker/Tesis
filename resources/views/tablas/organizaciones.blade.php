<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  {{-- <th>ID</th> --}}
                  <th>Nombre</th>
                  <th>Identificador</th>
                  <th>Municipio</th>
                  @can('update',new \App\Organizacion)
                  <th>Acciones</th>
                  @endcan
                </tr>
                </thead>

                <tbody>
                @foreach($model as $organizacion)
                <tr>
                  {{-- <td>{{$organizacion->id}}</td> --}}
                  <td>{{$organizacion->name}}</td>
                  <td>{{$organizacion->identificador}}</td>
                  <td>{{$organizacion->municipio->name}}</td>
                  @can('update',new \App\Organizacion)
                  <td>
                    @if(!$organizacion->activo)
                      <form id="quickForm" role="form" method="POST" action="{{ route('organizaciones.activar',$organizacion) }}">
                          {{ method_field('PUT') }} {!! csrf_field() !!}
                          <input type="hidden" value="1" name="activo">
                        <button class="btn btn-sm btn-primary" type="submit">
                          Activar
                        </button>
                      </form>
                    @else
                        <a href="{{route('organizaciones.edit',$organizacion)}}" class="btn btn-xs btn-info">
                          <i class="fa fa-pen"></i>
                        </a>
                        @can('delete',new \App\Organizacion)
                        <form method="POST" action="{{route('organizaciones.destroy', $organizacion)}}" style="display: inline;">
                          {{csrf_field()}}{{method_field('DELETE')}}
                          <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estas seguro de que deseas elimiar la organizacion?')">
                            <i class="fa fa-times"></i>
                          </button>
                        </form>
                        @endcan
                  </td>
                  @endcan
                  @endif
                </tr>
                @endforeach
                </tbody>
</table>