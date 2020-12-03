<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  {{-- <th>ID</th> --}}
                  <th>Nombre</th>
                  <th>Identificador</th>
                  <th>Municipio</th>
                  @can('update',new \App\Tercero)
                  <th>Acciones</th>
                  @endcan
                </tr>
                </thead>

                <tbody>
                @foreach($model as $tercero)
                <tr>
                  {{-- <td>{{$tercero->id}}</td> --}}
                  <td>{{$tercero->name}}</td>
                  <td>{{$tercero->identificador}}</td>
                  <td>{{$tercero->municipio->name}}</td>
                  
                  @can('update',new \App\Tercero)
                  <td>
                    @if(!$tercero->activo)
                      <form id="quickForm" role="form" method="POST" action="{{ route('terceros.activar',$tercero) }}">
                          {{ method_field('PUT') }} {!! csrf_field() !!}
                          <input type="hidden" value="1" name="activo">
                        <button class="btn btn-sm btn-primary" type="submit">
                          Activar
                        </button>
                      </form>
                    @else
                        <a href="{{route('terceros.edit',$tercero)}}" class="btn btn-xs btn-info">
                          <i class="fa fa-pen"></i>
                        </a>
                        @can('delete',new \App\Tercero)
                        <form method="POST" action="{{route('terceros.destroy', $tercero)}}" style="display: inline;">
                          {{csrf_field()}}{{method_field('DELETE')}}
                          <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estas seguro de que deseas elimiar el tercero?')">
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