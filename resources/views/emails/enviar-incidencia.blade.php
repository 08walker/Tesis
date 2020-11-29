@component('mail::message')
# Se ha reportado una incidencia

Fecha de la incidencia:
<br>
<strong>
{{\Carbon\Carbon::parse($hito->fyh_ini)->format('d/M/y')}}	
</strong>

@component('mail::table')
|Tipo de incidencia|Descripción|No. Transportación|
|:------------------|:-----------|:------------------|
|{{$hito->tipoHito->name}}|{{$hito->description}}|{{$hito->transportacion->numero}}|
@endcomponent


@component('mail::button', ['url' => 'login'])
Autenticarse
@endcomponent

Saludos,<br>
{{ config('app.name') }}
@endcomponent
