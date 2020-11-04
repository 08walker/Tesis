<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->truncateTables([
   		    'provincias',
            'municipios',
            'tipo_equipo',
            'tipo_arrastre',
   		    'terceros',
            'organizaciones',
            'equipos',
            'choferes',
            'arrastres',
            'lugares',
            'envases',
            'productos',
            'transportaciones',
            'arrastre_enva_equipo',
            'chofer_equipo_transp',
            'equipo_transportacion',
            'p_transf_env',
            'p_transf_rec',
            'prod_envase_env',
            'prod_envase_rec',
            'transf_enviadas',
            'transf_recibidas',
            'arrastre_transpor',
            'tipo_hito',
            //'hito'
            'sello_enviado',
            'sello_recibido',
            'unidad_medida',
            'tipo_unidad_medida',
            'producto_unidad_medida',
            
            'users',
            'roles',
            'permissions',
            'model_has_roles',
            'role_has_permissions',
            'directivos',

            'trazas',
    	]);
        $this->call(ProvinciaSeeder::class);
        $this->call(MunicipioSeeder::class);
        $this->call(TipoEquipoSeeder::class);
        $this->call(TipoArrastreSeeder::class);
        
        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);

        $this->call(TerceroSeeder::class);
        $this->call(OrganizacionSeeder::class);
        $this->call(EquipoSeeder::class);
        $this->call(ChoferSeeder::class);
        $this->call(ArrastreSeeder::class);
        $this->call(LugarSeeder::class);
        $this->call(EnvaseSeeder::class);

        $this->call(TipoUnidadMedidaSeeder::class);
        $this->call(UnidadMedidaSeeder::class);
        
        $this->call(ProductoSeeder::class);
        $this->call(TransportacionSeeder::class);
        
        $this->call(EquipoTransportacionSeeder::class);
        $this->call(ChoferEquipoTranspSeeder::class);
        $this->call(ArrastreTransporSeeder::class);
        $this->call(ArrastreEnvaEquipoSeeder::class);
        $this->call(PTransfEnvSeeder::class);
        $this->call(PTransfRecSeeder::class);
        $this->call(TransfEnviadaSeeder::class);
        $this->call(TransfRecibidaSeeder::class);
        $this->call(ProdEnvaEnvSeeder::class);
        $this->call(ProdEnvaRecSeeder::class);
        $this->call(TipoHitoSeeder::class);
        //$this->call(HitoSeeder::class);

        $this->call(SelloEnviadoSeeder::class);
        $this->call(SelloRecibidoSeeder::class);

        $this->call(ProductoUnidadMedidaSeeder::class);

        $this->call(DirectivoSeeder::class);
    }

    public function truncateTables(array $tables)
    {	
    	//para desactivar la revision de claves foraneas
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0 ;');
    
    	foreach ($tables as $table) {
    	//para limpiar la tabla
    	DB::table($table)->truncate();		
    	}
    
    	//para activar la revision de claves foraneas
    	DB::statement('SET FOREIGN_KEY_CHECKS = 1 ;');	
    }
}
