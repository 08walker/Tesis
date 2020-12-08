<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  {{-- <th>ID</th> --}}
                  <th>Número</th>
                  <th>Eequipo</th>
                  <th>Acciones</th>
                </tr>
                </thead>

                <tbody>
                @foreach($transportaciones as $transpor)
                <tr>
                  {{-- <td>{{$transpor->id}}</td> --}}
                  <td>{{$transpor->numero}}</td>
                  <td>{{$transpor->equipo->identificador}}</td>
                  <td>
                        @if($transpor->terminada)
                        <a href="{{route('transportaciones.detalles',$transpor)}}">
                            <i class="fa fa-eye"></i> Ver detalles
                          </a>
                        @else
                        @can('update',new \App\Transportacion)
                          <a href="{{route('transportaciones.formllenar',$transpor)}}">
                            <i class="fa fa-eye"></i>
                          </a>
                          @endcan
                          @can('update',new \App\Transportacion)
                          <a href="{{route('transportaciones.edit',$transpor)}}" class="btn btn-xs btn-info">
                            <i class="fa fa-pen"></i>
                          </a>
                          @endcan
                          @can('delete',new \App\Transportacion)
                        <form method="POST" action="{{route('transportaciones.destroy', $transpor)}}" style="display: inline;">
                          {{csrf_field()}}{{method_field('DELETE')}}
                          <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estas seguro de que deseas elimiar la transportacion?')">
                            <i class="fa fa-times"></i>
                          </button>
                        </form>
                        @endcan
                        @endif                        
                  </td>
                </tr>
                @endforeach
                </tbody>
            </table>