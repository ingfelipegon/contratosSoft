<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UnidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$unidades = [
        	'ANOS', 
        	'MESES`',
        	'DIAS',        	
        ];

        foreach ($unidades as $key => $value) {
        	DB::table('unidades')->insert([
        		'nombre' => $value,
        		'descripcion' => Str::random(50),
        	]);
        }
    }
}
