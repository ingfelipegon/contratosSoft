<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TramiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$tramites = [
        	'PRECONTRACTUAL', 
            'POSTCONTRACTUAL',
            'NINGUNO',
        ];

        foreach ($tramites as $key => $value) {
        	DB::table('tipos_tramite')->insert([
        		'nombre' => $value,
        		'descripcion' => Str::random(50),
        	]);
        }
    }
}
