<?php

use Illuminate\Database\Seeder;
use App\Models\VsaadBloque;

class VsaadBloquesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      VsaadBloque::create([
        'codigo'    => '1',
        'nombre'    => 'BLOQUE CARIBE',
      ]);
      VsaadBloque::create([
        'codigo'    => '2',
        'nombre'    => 'BLOQUE MAGDALENA MEDIO',
      ]);
      VsaadBloque::create([
        'codigo'    => '3',
        'nombre'    => 'BLOQUE NOROCCIDENTAL',
      ]);
      VsaadBloque::create([
        'codigo'    => '4',
        'nombre'    => 'BLOQUE OCCIDENTAL',
      ]);
      VsaadBloque::create([
        'codigo'    => '5',
        'nombre'    => 'BLOQUE ORIENTAL',
      ]);
      VsaadBloque::create([
        'codigo'    => '6',
        'nombre'    => 'BLOQUE SUR',
      ]);
      VsaadBloque::create([
        'codigo'    => '7',
        'nombre'    => 'COMANDO CONJUNTO CENTRAL',
      ]);
    }
}
