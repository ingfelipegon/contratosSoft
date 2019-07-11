<?php

use Illuminate\Database\Seeder;
use App\Models\VsaadPerfil;

class VsaadPerfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      VsaadPerfil::create([
        'nombre'    => 'Administrador',
      ]);
      VsaadPerfil::create([
        'nombre'    => 'Abogado',
      ]);
    }
}
