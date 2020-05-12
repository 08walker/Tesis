<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name'=>'laura',
        	'email'=>'laura@gmail.com',
        	'password'=>bcrypt('123456'),
        ]);
        User::create([
        	'name'=>'walker',
        	'email'=>'walker@gmail.com',
        	'password'=>bcrypt('123456'),
        ]);
        User::create([
        	'name'=>'yisel',
        	'email'=>'yisel@gmail.com',
        	'password'=>bcrypt('123456'),        	
        ]);
    }
}
