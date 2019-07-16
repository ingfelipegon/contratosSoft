<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ModalidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$modalidades = [
        	'INVITACION COMPETITIVA PUBLICA', 
        	'INVITACION COMPETITIVA PUBLICA INFERIOR A 100 SMMLV',
        	'INVITACION COMPETITIVA PUBLICA SUBASTA A LA BAJA',
        	'INVITACIÓN COMPETITIVA CERRADA',
        ];

        foreach ($modalidades as $key => $value) {
        	DB::table('modalidades')->insert([
        		'nombre' => $value,
        		'descripcion' => Str::random(50),
        	]);
        }
    }
}
