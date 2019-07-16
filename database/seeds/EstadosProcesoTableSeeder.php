<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EstadosProcesoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = [
            'EN PROCESO',
            'FINALIZADO'
        ];

        foreach ($estados as $key => $value) {
        	DB::table('estados_proceso')->insert([
        		'nombre' => $value,
        		'descripcion' => Str::random(50),
        	]);
        }
    }
}
