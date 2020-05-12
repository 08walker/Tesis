@extends('layouts.app')
@section('content')
@include('partials.errors')
@include('partials.success')
    <div class="container">
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 pull-left">
            <!-- Jumbotron -->
            <div class="jumbotron">
                <h1>Envase: </h1>
                <h2>Identificador: {{$envase->identificador}}</h2>
                <h3>Alquilado:
                    @if ($envase->es_propio > 0)
                        Si
                        <h3>Tercero: {{$envase->tercero->name}}</h3>
                    @else
                        No
                        <h3>Agencia: {{$envase->organizacion->name}}</h3>
                    @endif
                </h3>
                
                <p><a class="btn btn-primary" href="{{route('envases')}}" role="button">Atras</a></p>
            </div>
        </div>

        <div class="col-xs-12 col-sm-3 pull-right">
            <div class="sidebar-module">
                <h4>Acciones:</h4>
                <ol class="list-unstyled">
                    <li><a href="{{route('envases.create')}}">Crear nuevo envase</a></li>
                    <li><a href="{{route('envases')}}">Ver todas los envases</a></li>
                    <li><a href="{{route('envases.edit',$envase)}}">Editar</a></li>
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