<?php

use Illuminate\Database\Seeder;
use App\Models\VsaadpertenenciaEtnia;

class VsaadPertenenciasEtniasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VsaadpertenenciaEtnia::create([
         'nombre'    => 'INDIGENA',
       ]);
        VsaadpertenenciaEtnia::create([
         'nombre'    => 'ROOM O GITANAS',
       ]);
        VsaadpertenenciaEtnia::create([
         'nombre'    => 'COMUNIDADES NEGRAS, PALENQUERAS O RAIZALES',
       ]);
        VsaadpertenenciaEtnia::create([
         'nombre'    => 'NINGUNA',
       ]);
        VsaadpertenenciaEtnia::create([
         'nombre'    => 'OTRA',
       ]);
    }
}
