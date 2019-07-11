<?php

use Illuminate\Database\Seeder;
use App\Models\VsaadenfoqueAbogado;

class VsaadEnfoquesAbogadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VsaadenfoqueAbogado::create([
          'nombre'    => 'Representación de víctimas',
        ]);
        VsaadenfoqueAbogado::create([
          'nombre'    => 'Defensa de comparecientes',
        ]);
    }
}
