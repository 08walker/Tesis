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
            'chofer_equipo_transp',
            'transf_enviadas',
            'tipo_hito',
            //'hitos',
            'unidad_medida',
            'tipo_unidad_medida',
            
            'users',
            'roles',
            'permissions',
            'model_has_roles',
            'role_has_permissions',
            'directivos',

            'arrasrtre__transps',
            'arrasrtre__transp__envas',
            'transf__env__prods',

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

        $this->call(DirectivoSeeder::class);
        
        $this->call(TipoHitoSeeder::class);
        // $this->call(HitoSeeder::class);

        // $this->call(ChoferEquipoTranspSeeder::class);
        // $this->call(ArrastreTransporSeeder::class);
        // $this->call(ArrastreEnvaEquipoSeeder::class);
        // $this->call(TransfEnviadaSeeder::class);
        // $this->call(ProdEnvaEnvSeeder::class);
        
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
