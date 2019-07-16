<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EstadosOperacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = [
            'COMENZAR ETAPA',             //SEMAFORO NARANJA
            'ESTAPA EN TIEMPO',           //SEMAFORO VERDE
            'INICIO ETAPA',               //SEMAFORO AMARILLO
            'SUPERA ETAPA',               //SEMAFORO ROJO
        ];

        foreach ($estados as $key => $value) {
        	DB::table('estados_operacion')->insert([
        		'nombre' => $value,
        		'descripcion' => Str::random(50),
        	]);
        }
    }
}
