<?php

use Illuminate\Database\Seeder;
use App\Models\VsaadtipoAbogado;

class VsaadTiposAbogadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VsaadtipoAbogado::create([
        'nombre'    => 'Abogado SAAD',
      ]);
        VsaadtipoAbogado::create([
        'nombre'    => 'De confianza',
      ]);
    }
}
