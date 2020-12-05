<?php

use App\Transf_Env_Prod;
use Illuminate\Database\Seeder;

class TransfEnvProdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Transf_Env_Prod::class,3)->create([
	        'transf_enviada_id'=>'1',
        ]);
        factory(Transf_Env_Prod::class,4)->create([
	        'transf_enviada_id'=>'2',
        ]);
        factory(Transf_Env_Prod::class,6)->create([
	        'transf_enviada_id'=>'3',
        ]);
        factory(Transf_Env_Prod::class,2)->create([
	        'transf_enviada_id'=>'4',
        ]);
        factory(Transf_Env_Prod::class,1)->create([
	        'transf_enviada_id'=>'5',
        ]);
        factory(Transf_Env_Prod::class,4)->create([
	        'transf_enviada_id'=>'6',
        ]);
        factory(Transf_Env_Prod::class,6)->create([
	        'transf_enviada_id'=>'7',
        ]);
        factory(Transf_Env_Prod::class,7)->create([
	        'transf_enviada_id'=>'8',
        ]);
        factory(Transf_Env_Prod::class,2)->create([
	        'transf_enviada_id'=>'9',
        ]);
        factory(Transf_Env_Prod::class,3)->create([
	        'transf_enviada_id'=>'10',
        ]);
        factory(Transf_Env_Prod::class,5)->create([
	        'transf_enviada_id'=>'11',
        ]);
        factory(Transf_Env_Prod::class,7)->create([
	        'transf_enviada_id'=>'12',
        ]);
        factory(Transf_Env_Prod::class,3)->create([
	        'transf_enviada_id'=>'13',
        ]);
        factory(Transf_Env_Prod::class,2)->create([
	        'transf_enviada_id'=>'14',
        ]);
        factory(Transf_Env_Prod::class,3)->create([
	        'transf_enviada_id'=>'15',
        ]);
        factory(Transf_Env_Prod::class,4)->create([
	        'transf_enviada_id'=>'16',
        ]);
        factory(Transf_Env_Prod::class,5)->create([
            'transf_enviada_id'=>'17',
        ]);
    }
}
