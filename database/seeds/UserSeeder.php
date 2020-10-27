<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

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
