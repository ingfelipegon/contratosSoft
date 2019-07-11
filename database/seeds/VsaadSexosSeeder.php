<?php

use Illuminate\Database\Seeder;
use App\Models\VsaadSexo;

class VsaadSexosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      VsaadSexo::create([
        'nombre'    => 'Femenino',
      ]);
      VsaadSexo::create([
        'nombre'    => 'Masculino',
      ]);
    }
}
