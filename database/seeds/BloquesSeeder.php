<?php

use App\Models\Bloque;
use Illuminate\Database\Seeder;

class BloquesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=Bloque::create([
            'nombre'=>"Bloque Caribe"
            ]);
        
        $user=Bloque::create([
            'nombre'=>"Bloques Metro"
            ]);

        $user=Bloque::create([
            'nombre'=>"Bloques Oriente"
            ]);            
    }
}
