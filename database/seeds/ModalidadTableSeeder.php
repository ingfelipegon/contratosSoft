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
        	'INVITACIÓN  PUBLICA (igual o superior a 450 SMMLV)', 
        	'INVITACIÓN PUBLICA (INFERIOR A 450 SMMLV)',
        	'INVITACIÓN PUBLICA (INFERIOR A 45 SMMLV)',
            'SUBASTA A LA BAJA',
            'INVITACIÓN CERRADA',
            'CONTRATACION SIN PLURALIDAD DE OFERENTES',
            'TIENDA VIRTUAL',
            'INCUMPLIMIENTO CLAUSULA PENAL PECUNIARIA',
            'INCUMPLIMIENTO CLAUSULA PENAL DE APREMIO',
            'INCUMPLIMIENTO CLAUSULA PENAL TERMINACION ANTICIPADA',
            'CESION',
            'SUSPENSION O TERMINACION MUTUO ACUERDO',
            'OTROS',
            'BALANCE FINAL Y CIERRE'
        ];

        foreach ($modalidades as $key => $value) {
        	DB::table('modalidades')->insert([
        		'nombre' => $value,
        		'descripcion' => Str::random(50),
        	]);
        }
    }
}
