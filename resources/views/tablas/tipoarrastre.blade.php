<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  {{-- <th>ID</th> --}}
                  <th>Nombre</th>
                  @can('update',new \App\TipoArrastre)
                  <th>Acciones</th>
                  @endcan
                </tr>
                </thead>

                <tbody>
                @foreach($model as $tipo)
                <tr>
                  {{-- <td>{{$tipo->id}}</td> --}}
                  <td>{{$tipo->name}}</td>
                  @can('update',new \App\TipoArrastre)
                  <td>
                    @if(!$tipo->activo)
                      <form id="quickForm" role="form" method="POST" action="{{ route('tipoarrastre.activar',$tipo) }}">
                          {{ method_field('PUT') }} {!! csrf_field() !!}
                          <input type="hidden" value="1" name="activo">
                        <button class="btn btn-sm btn-primary" type="submit">
                          Activar
                        </button>
                      </form>
                    @else
                        <a href="{{route('tipoarrastre.edit',$tipo)}}" class="btn btn-xs btn-info">
                          <i class="fa fa-pen"></i>
                        </a>
                        @can('delete',new \App\TipoArrastre)
                        <form method="POST" action="{{route('tipoarrastre.destroy', $tipo)}}" style="display: inline;">
                          {{csrf_field()}}{{method_field('DELETE')}}
                          <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estas seguro de que deseas elimiar el tipo de arrastre?')">
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