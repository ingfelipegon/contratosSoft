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
            'COMENZAR ETAPA',             //SEMAFORO AMARILLO
            'ETAPA EN TIEMPO',            //SEMAFORO AMARILLO
            'INICIO ETAPA',               //SEMAFORO NARANJA
            'SUPERA ETAPA',               //SEMAFORO ROJO
            'ETAPA FINALIZADA',           //SEMAFORO VERDE
        ];

        foreach ($estados as $key => $value) {
        	DB::table('estados_operacion')->insert([
        		'nombre' => $value,
        		'descripcion' => Str::random(50),
        	]);
        }
    }
}
