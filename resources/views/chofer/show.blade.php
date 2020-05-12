@extends('layouts.app')
@section('content')
@include('partials.errors')
@include('partials.success')
    <div class="container">
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 pull-left">
            <!-- Jumbotron -->
            <div class="jumbotron">
                <h1>Chofer: </h1>
                <h2>Nombre: {{$chofer->name}}</h2>
                <h3>Apellido: {{$chofer->apellido}}</h3>
                <h3>Carnet:{{$chofer->ci}}</h3>
                <h3>Licencia:{{$chofer->licencia}}</h3>
                <h3>Telefono:{{$chofer->telefono}}</h3>
                <h3>Equipo: {{$chofer->equipo->identificador}}</h3>
                <h3>
                    @if ($chofer->es_propio == 0)
                        Contratado:Si
                        <h3>Tercero: {{$chofer->tercero->name}}</h3>
                    @else
                        Contratado:No
                        <h3>Organización: {{$chofer->organizacion->name}}</h3>    
                    @endif             
                </h3>
                
                <p><a class="btn btn-primary" href="{{route('choferes')}}" role="button">Atras</a></p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 pull-right">
            <div class="sidebar-module">
                <h4>Acciones:</h4>
                <ol class="list-unstyled">
                    <li><a href="{{route('choferes.create')}}">Crear nuevo chofer</a></li>
                    <li><a href="{{route('choferes')}}">Ver todos los choferes</a></li>
                    <li><a href="{{route('choferes.edit',$chofer)}}">Editar</a></li>
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