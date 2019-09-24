<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EstadosCustodiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = [
            'EN CUSTODIA',             //SEMAFORO AMARILLO
            'EN PRESTAMO',            //SEMAFORO AMARILLO
            'ENTREGADO',               //SEMAFORO NARANJA
        ];

        foreach ($estados as $key => $value) {
        	DB::table('estados_custodia')->insert([
        		'nombre' => $value,
        		'descripcion' => Str::random(50),
        	]);
        }
    }
}
