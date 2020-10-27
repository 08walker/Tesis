<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create([
            'name'=>'Admin',
            //'display_name'=>'Administrador'
        ]);
        $transporteRole = Role::create([
            'name'=>'Transporte',
            //'display_name'=>'Escritor'
        ]);
        $analistaRole = Role::create([
            'name'=>'Analista',
            //'display_name'=>'Escritor'
        ]);
        $inivitadoRole = Role::create([
            'name'=>'Invitado',
            //'display_name'=>'Escritor'
        ]);
    }
}
