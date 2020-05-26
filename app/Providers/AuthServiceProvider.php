<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Arrastre' => 'App\Policies\ArrastrePolicy',
        'App\Chofer' => 'App\Policies\ChoferPolicy',
        'App\Envase' => 'App\Policies\EnvasePolicy',
        'App\Equipo' => 'App\Policies\EquipoPolicy',
        'App\Lugar' => 'App\Policies\LugarPolicy',
        'App\Hito' => 'App\Policies\HitoPolicy',
        'App\Municipio' => 'App\Policies\MunicipioPolicy',
        'App\Organizacion' => 'App\Policies\OrganizacionPolicy',
        'App\Producto' => 'App\Policies\ProductoPolicy',
        'App\Provincia' => 'App\Policies\ProvinciaPolicy',
        'App\Tercero' => 'App\Policies\TerceroPolicy',
        'App\TipoArrastre' => 'App\Policies\TipoArrastrePolicy',
        'App\TipoEquipo' => 'App\Policies\TipoEquipoPolicy',
        'App\TipoHito' => 'App\Policies\TipoHitoPolicy',
        'App\TipoUnidadMedida' => 'App\Policies\TipoUnidadMedidaPolicy',
        'App\UnidadMedida' => 'App\Policies\UnidadMedidaPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
