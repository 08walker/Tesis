@extends('layouts.app')
@section('content')
@include('partials.errors')
@include('partials.success')
    <div class="container">
        <div class="row">
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 pull-left">
            
            <!-- Jumbotron -->
            <div class="jumbotron">
                <h1>Agencia: </h1>
                <h2>Nombre: {{$tercero->name}}</h2>
                <h3>Identificador: {{$tercero->identificador}}</h3>
                
                <h3>Municipio: {{$tercero->municipio->name}}</h3>
                <p><a class="btn btn-primary" href="{{route('terceros')}}" role="button">Atras</a></p>
            </div>

        </div>
        <div class="col-xs-12 col-sm-3 pull-right">
            <div class="sidebar-module">
                <h4>Acciones:</h4>
                <ol class="list-unstyled">
                    <li><a href="{{route('terceros.create')}}">Crear nueva agencia</a></li>
                    <li><a href="{{route('terceros')}}">Ver todas las agencias</a></li>
                    <li><a href="{{route('terceros.edit',$tercero)}}">Editar</a></li>
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
    </div>
@endsection