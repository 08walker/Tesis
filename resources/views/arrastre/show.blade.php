@extends('layouts.app')
@section('content')
@include('partials.errors')
@include('partials.success')
    <div class="container">
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 pull-left">
            <!-- Jumbotron -->
            <div class="jumbotron">
                <h1>Arrastre: </h1>
                <h2>Chapa: {{$arrastre->identificador}}</h2>
                <h3>Descripción: {{$arrastre->description}}</h3>
                <h3>Volumen Máximo:{{$arrastre->volumen_max_carga}}</h3>
                <h3>Pesos Máximo:{{$arrastre->peso_max_carga}}</h3>
                <h3>Equipo: {{$arrastre->equipo->identificador}}</h3>
                <h3>Tipo de arrastre: {{$arrastre->tipoArrastre->name}}</h3>
                <h3>
                    @if ($arrastre->es_propio > 0)
                      Alquilado:No
                      <h3>Organización: {{$arrastre->organizacion->name}}</h3>    
                    @else
                      Alquilado:Si
                      <h3>Agencia: {{$arrastre->tercero->name}}</h3>
                    @endif
                </h3>
            
                <p><a class="btn btn-primary" href="{{ route('arrastres')}}" role="button">Atras</a></p>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-3 pull-right">
            <div class="sidebar-module">
                <h4>Acciones:</h4>
                <ol class="list-unstyled">
                    <li><a href="{{route('arrastres.create')}}">Crear nuevo arrastre</a></li>
                    <li><a href="{{route('arrastres')}}">Ver todas los arrastres</a></li>
                    <li><a href="{{route('arrastres.edit',$arrastre)}}">Editar</a></li>
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