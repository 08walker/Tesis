@extends('admin.layout')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Detalles del usuario:</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        <!-- Main content -->
        <div class="content">
          <div class="container">
            <div class="row">
                <div class="col-md-4">
    <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="/adminlte/dist/img/avatar5.png" alt="{{$user->name}}">
                </div>

                <h3 class="profile-username text-center">{{$user->name}}</h3>
                @if($user->roles()->count())
                        <p class="text-muted text-center">{{$user->getRoleNames()->implode(', ')}}</p>
                @endif
                <ul class="list-group list-group-unbordered mb-4">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{$user->email}}</a>
                  </li>
                </ul>

                <a href="{{route('user.edit',auth()->user())}}" class="btn btn-primary btn-block"><b>Editar</b></a>
              </div>
              <!-- /.card-body -->
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="card-title">Roles</h5>
            </div>
            <div class="card-body">
              @forelse($user->roles as $role)
                <strong>{{$role->name}}</strong><br>
                @if( $role->permissions->count() )
                <small class="text-muted">Permisos:
                  {{$role->permissions->pluck('name')->implode(', ')}}</small><br>
                @endif
                @unless($loop->last)
                <hr>
                @endunless
              @empty
              <small class="text-muted">No tiene ningún role.</small>
              @endforelse
            </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="card-title">Permisos extra:</h5>
            </div>
            <div class="card-body">
              @forelse($user->permissions as $permission)
                <strong>{{$permission->name}}</strong><br>
                @unless($loop->last)
                <hr>
                @endunless
              @empty
              <small class="text-muted">No tiene permisos adicionales.</small>
              @endforelse
            </div>
    </div>
  </div>

              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection

@push('scripts')
  <!-- jquery-validation -->
  <script src="/adminlte/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="/adminlte/plugins/jquery-validation/additional-methods.min.js"></script>

@endpush