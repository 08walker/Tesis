<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  {{-- <th>ID</th> --}}
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Roles</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($model as $user)
                    <tr>
                      {{-- <td>{{$user->id}}</td> --}}
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->getRoleNames()->implode(', ')}}</td>
                      <td>
                        @if(!$user->activo)
                      <form id="quickForm" role="form" method="POST" action="{{ route('user.activar',$user) }}">
                          {{ method_field('PUT') }} {!! csrf_field() !!}
                          <input type="hidden" value="1" name="activo">
                        <button class="btn btn-sm btn-primary" type="submit">
                          Activar
                        </button>
                      </form>
                    @else
                        <a href="{{route('user.show',$user)}}">
                          <i class="fa fa-eye"></i>
                        </a>
                        @if($user->id!==1)
                        @can('update',$user)
                        <a href="{{route('user.edit',$user)}}" class="btn btn-xs btn-info">
                          <i class="fa fa-pen"></i>
                        </a>
                        @endcan

                        @role('Admin')
                        <form method="POST" action="{{route('user.destroy', $user)}}" style="display: inline;">
                          {{csrf_field()}}{{method_field('DELETE')}}
                          <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estas seguro de que deseas elimiar la usuario?')">
                            <i class="fa fa-times"></i>
                          </button>
                        </form>
                        @endrole
                        @endif
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>