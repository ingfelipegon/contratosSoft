<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FuenteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$fuentes = [
        	'PROPIOS', 
        	'NACION',
        ];

        foreach ($fuentes as $key => $value) {
        	DB::table('fuentes')->insert([
        		'nombre' => $value,
        		'descripcion' => Str::random(50),
        	]);
        }
    }
}
