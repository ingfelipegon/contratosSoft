<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
        	'SALAS', 
        	'GRAI', 
        	'GRANCE'		
        ];

        foreach ($areas as $key => $value) {
        	DB::table('areas')->insert([
        		'nombre' => $value,
        		'descripcion' => Str::random(50),
        	]);
        }
    }
}
