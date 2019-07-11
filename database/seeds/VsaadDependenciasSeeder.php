<?php

use Illuminate\Database\Seeder;
use App\Models\VsaadDependencia;

class VsaadDependenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      VsaadDependencia::create([
        'nombre'    => 'SAAD Victimas',
      ]);
      VsaadDependencia::create([
        'nombre'    => 'SAAD Comparecientes',
      ]);
    }
}
