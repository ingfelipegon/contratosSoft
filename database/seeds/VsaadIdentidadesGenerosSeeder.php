<?php

use Illuminate\Database\Seeder;
use App\Models\VsaadidentidadGenero;

class VsaadIdentidadesGenerosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VsaadidentidadGenero::create([
          'nombre'    => 'MUJER',
        ]);
        VsaadidentidadGenero::create([
          'nombre'    => 'HOMBRE',
        ]);
        VsaadidentidadGenero::create([
          'nombre' => 'TRANSGENERO',
        ]);
        VsaadidentidadGenero::create([
          'nombre' => 'SIN INFORMACIÓN',
        ]);
        VsaadidentidadGenero::create([
          'nombre' => 'OTRA',
        ]);
    }
}
