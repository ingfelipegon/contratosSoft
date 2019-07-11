<?php

use Illuminate\Database\Seeder;
use App\Models\VsaadtipoDocumento;

class VsaadTiposDcumentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      VsaadtipoDocumento::create([
      'nombre'    => 'Cédula de ciudadanía',

    ]);
    VsaadtipoDocumento::create([
    'nombre'    => 'Cédula de extranjería',

  ]);
      VsaadtipoDocumento::create([
      'nombre'    => 'Tarjeta de identidad',

    ]);
  VsaadtipoDocumento::create([
      'nombre'    => 'Registro civil',

    ]);

      VsaadtipoDocumento::create([
      'nombre'    => 'Pasaporte',

    ]);

    }
}
