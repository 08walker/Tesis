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
        
        'App\User' => 'App\Policies\UserPolicy',
        'Spatie\Permission\Models\Role' => 'App\Policies\RolePolicy',
        'Spatie\Permission\Models\Permission' => 'App\Policies\PermissionPolicy',

        'App\Directivo' => 'App\Policies\DirectivoPolicy',

        'App\Traza' => 'App\Policies\TrazaPolicy',
        'App\Transportacion' => 'App\Policies\TransportacionPolicy',
        'App\TransfEnviada' => 'App\Policies\TransfEnviadaPolicy',
        'App\Reporte1' => 'App\Policies\Reporte1Policy',
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
