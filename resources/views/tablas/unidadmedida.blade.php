<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  {{-- <th>ID</th> --}}
                  <th>Nombre</th>
                  <th>identificador</th>
                  <th>Tipo unidad de medida</th>
                  @can('update',new \App\UnidadMedida)
                  <th>Acciones</th>
                  @endcan
                </tr>
                </thead>
                <tbody>
                @foreach($unidadmedida as $unidad)
                <tr>
                  {{-- <td>{{$unidad->id}}</td> --}}
                  <td>{{$unidad->name}}</td>
                  <td>{{$unidad->identificador}}</td>
                  <td>{{$unidad->tipoUnidadMedida->name}}</td>
                  
                  @can('update',new \App\UnidadMedida)
                  <td>
                    @if(!$unidad->activo)
                      <form id="quickForm" role="form" method="POST" action="{{ route('unidadmedida.activar',$unidad) }}">
                          {{ method_field('PUT') }} {!! csrf_field() !!}
                          <input type="hidden" value="1" name="activo">
                        <button class="btn btn-sm btn-primary" type="submit">
                          Activar
                        </button>
                      </form>
                    @else
                        <a href="{{route('unidadmedida.edit',$unidad)}}" class="btn btn-xs btn-info">
                          <i class="fa fa-pen"></i>
                        </a>
                        @can('delete',new \App\UnidadMedida)
                        <form method="POST" action="{{route('unidadmedida.destroy', $unidad)}}" style="display: inline;">
                          {{csrf_field()}}{{method_field('DELETE')}}
                          <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estas seguro de que deseas elimiar la unidad de medida?')">
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