<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class IdentificacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$tiposIdentificacion = [
        	'CEDULA CIUDADANIA', 
            'PAPORTE',
            'CEDULA EXTRANJERIA', 
            'TARJETA IDENTIDAD', 
        ];

        foreach ($tiposIdentificacion as $key => $value) {
        	DB::table('tipos_identificacion')->insert([
        		'nombre' => $value,
        		'descripcion' => Str::random(50),
        	]);
        }
    }
}
