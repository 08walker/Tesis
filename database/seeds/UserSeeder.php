<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
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
            'name'=>'Directivo',
            //'display_name'=>'Escritor'
        ]);

        //Permisos Rol Admin
        // $adminRole->givePermissionTo('View users');
        // $adminRole->givePermissionTo('Create users');
        // $adminRole->givePermissionTo('Update users');
        // $adminRole->givePermissionTo('Delete users');

        // $adminRole->givePermissionTo('View roles');
        // $adminRole->givePermissionTo('Create roles');
        // $adminRole->givePermissionTo('Update roles');
        // $adminRole->givePermissionTo('Delete roles');

        // $adminRole->givePermissionTo('View permissions');
        // $adminRole->givePermissionTo('Update permissions');

        //Permisos Rol Transporte
        $transporteRole->givePermissionTo('View tArrastre');
        $transporteRole->givePermissionTo('Create tArrastre');
        $transporteRole->givePermissionTo('Update tArrastre');

        $transporteRole->givePermissionTo('View tEquipo');
        $transporteRole->givePermissionTo('Create tEquipo');
        $transporteRole->givePermissionTo('Update tEquipo');

        $transporteRole->givePermissionTo('View arrastre');
        $transporteRole->givePermissionTo('Create arrastre');
        $transporteRole->givePermissionTo('Update arrastre');

        $transporteRole->givePermissionTo('View chofer');
        $transporteRole->givePermissionTo('Create chofer');
        $transporteRole->givePermissionTo('Update chofer');

        $transporteRole->givePermissionTo('View envase');
        $transporteRole->givePermissionTo('Create envase');
        $transporteRole->givePermissionTo('Update envase');

        $transporteRole->givePermissionTo('View equipo');
        $transporteRole->givePermissionTo('Create equipo');        
        $transporteRole->givePermissionTo('Update equipo');

        //Permisos Rol Analista
        $analistaRole->givePermissionTo('View lugar');
        $analistaRole->givePermissionTo('Create lugar');
        $analistaRole->givePermissionTo('Update lugar');

        $analistaRole->givePermissionTo('View municipio');

        $analistaRole->givePermissionTo('View provincia');

        $analistaRole->givePermissionTo('View organization');
        $analistaRole->givePermissionTo('Create organization');
        $analistaRole->givePermissionTo('Update organization');

        $analistaRole->givePermissionTo('View tercero');
        $analistaRole->givePermissionTo('Create tercero');
        $analistaRole->givePermissionTo('Update tercero');

        $analistaRole->givePermissionTo('View TunidadMedida');
        $analistaRole->givePermissionTo('Create TunidadMedida');
        $analistaRole->givePermissionTo('Update TunidadMedida');

        $analistaRole->givePermissionTo('View unidadMedida');
        $analistaRole->givePermissionTo('Create unidadMedida');
        $analistaRole->givePermissionTo('Update unidadMedida');

        $analistaRole->givePermissionTo('View transportation');
        $analistaRole->givePermissionTo('Create transportation');
        $analistaRole->givePermissionTo('Update transportation');

        $analistaRole->givePermissionTo('View producto');
        $analistaRole->givePermissionTo('Create producto');
        $analistaRole->givePermissionTo('Update producto');

        $analistaRole->givePermissionTo('View directivo');
        $analistaRole->givePermissionTo('Create directivo');
        $analistaRole->givePermissionTo('Update directivo');

        $analistaRole->givePermissionTo('View transferencia');
        $analistaRole->givePermissionTo('Create transferencia');
        $analistaRole->givePermissionTo('Update transferencia');
        
        //Permisos Rol Invitado
        $inivitadoRole->givePermissionTo('View provincia');
        $inivitadoRole->givePermissionTo('View municipio');
        $inivitadoRole->givePermissionTo('View tercero');
        $inivitadoRole->givePermissionTo('View organization');
        $inivitadoRole->givePermissionTo('View lugar');
        $inivitadoRole->givePermissionTo('View equipo');
        $inivitadoRole->givePermissionTo('View arrastre');
        $inivitadoRole->givePermissionTo('View unidadMedida');
        $inivitadoRole->givePermissionTo('View TunidadMedida');
        $inivitadoRole->givePermissionTo('View tArrastre');
        $inivitadoRole->givePermissionTo('View tEquipo');
        $inivitadoRole->givePermissionTo('View roles');
        $inivitadoRole->givePermissionTo('View producto');
        $inivitadoRole->givePermissionTo('View chofer');
        $inivitadoRole->givePermissionTo('View envase');
        $inivitadoRole->givePermissionTo('View directivo');
        $inivitadoRole->givePermissionTo('View reporte');
        $inivitadoRole->givePermissionTo('View transferencia');


        $admin = new User;
        $admin->name ='Walker';
        $admin->email ='walker@walker.com';
        $admin->password ='123456';
        $admin->save();
        $admin->assignRole($adminRole);

        $writer = new User;
        $writer->name='Yisel';
        $writer->email='yisel@yisel.com';
        $writer->password='123456';
        $writer->save();
        $writer->assignRole($transporteRole);

        $writer2 = new User;
        $writer2->name = 'Laura';
        $writer2->email = 'laura@laura.com';
        $writer2->password='123456';
        $writer2->save();
        $writer2->assignRole($analistaRole);

        $writer3 = new User;
        $writer3->name = 'Pepe';
        $writer3->email = 'pepe@pepe.com';
        $writer3->password='123456';
        $writer3->save();
        $writer3->assignRole($inivitadoRole);

        factory(User::class,11)->create([
            'password'=>'123456'
        ]);
    }
}
