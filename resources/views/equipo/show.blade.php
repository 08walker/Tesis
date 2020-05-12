@extends('layouts.app')
@section('content')
@include('partials.errors')
@include('partials.success')
    <div class="container">
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 pull-left">
            <!-- Jumbotron -->
            <div class="jumbotron">
                <h1>Equipo: </h1>
                <h2>Chapa: {{$equipo->identificador}}</h2>
                <h3>Descripcion: {{$equipo->description}}</h3>
                <h3>Vol. Max.:{{$equipo->volumen_max_carga}}</h3>
                <h3>Pesos Max.:{{$equipo->peso_max_carga}}</h3>
                <h3>Puede cargar:
                    @if ($equipo->puede_cargar > 0)
                        Si
                    @else
                        No
                    @endif
                </h3>
                <h3>Alquilado:
                    @if ($equipo->es_propio == 0)
                        Si
                        <h3>Agencia: {{$equipo->tercero->name}}</h3>        
                    @else
                        No
                        <h3>Organización: {{$equipo->organizacion->name}}</h3>
                    @endif
                </h3>
                <h3>Tipo de equipo: {{$equipo->tipoEquipo->name}}</h3>
                <p><a class="btn btn-primary" href="{{route('equipos')}}" role="button">Atras</a></p>
            </div>
        </div>

        <div class="col-xs-12 col-sm-3 pull-right">
            <div class="sidebar-module">
                <h4>Acciones:</h4>
                <ol class="list-unstyled">
                    <li><a href="{{route('equipos.create')}}">Crear nuevo equipo</a></li>
                    <li><a href="{{route('equipos')}}">Ver todas los equipos</a></li>
                    <li><a href="{{route('equipos.edit',$equipo)}}">Editar</a></li>
                    <br>
                    {{--
                    <li>
                        <a href="#" onclick="
                            var result = confirm('Are you sure you wish to delete this Project?');
                               if ( result ) {
                                  event.preventDefault();
                                  document.getElementById('delete-form').submit();
                         }">Delete</a>
                                        
                         <form id="delete-form" action="{{ route('companies.destroy',[$company->id]) }}" 
                                          method="POST" style="display: none;">
                            <input type="hidden" name="_method" value="delete">
                            {{ csrf_field()}}
                        </form>
                    </li>
                --}}
                </ol>
            </div>
        </div>
    </div>
@endsection