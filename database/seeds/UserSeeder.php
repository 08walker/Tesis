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
            'name'=>'Invitado',
            //'display_name'=>'Escritor'
        ]);

        //$adminRole->givePermissionTo('View users');

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

        $admin = new User;
        $admin->name ='walker';
        $admin->email ='walker@walker.com';
        $admin->password =bcrypt('123456');
        $admin->save();
        $admin->assignRole($adminRole);

        $writer = new User;
        $writer->name='yisel';
        $writer->email='yisel@yisel.com';
        $writer->password=bcrypt('123456');
        $writer->save();
        $writer->assignRole($transporteRole);

        $writer2 = new User;
        $writer2->name = 'laura';
        $writer2->email = 'laura@laura.com';
        $writer2->password=bcrypt('123456');
        $writer2->save();
        $writer2->assignRole($analistaRole);

        $writer3 = new User;
        $writer3->name = 'Paco';
        $writer3->email = 'paco@paco.com';
        $writer3->password=bcrypt('123456');
        $writer3->save();
        $writer3->assignRole($inivitadoRole);

        factory(User::class,11)->create([
            'password'=>bcrypt('123456')
        ]);

        // User::create([
        // 	'name'=>'laura',
        // 	'email'=>'laura@gmail.com',
        // 	'password'=>bcrypt('123456'),
        // ]);
        // User::create([
        // 	'name'=>'walker',
        // 	'email'=>'walker@gmail.com',
        // 	'password'=>bcrypt('123456'),
        // ]);
        // User::create([
        // 	'name'=>'yisel',
        // 	'email'=>'yisel@gmail.com',
        // 	'password'=>bcrypt('123456'),        	
        // ]);
    }
}
