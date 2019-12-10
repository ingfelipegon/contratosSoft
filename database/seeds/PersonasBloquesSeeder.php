<?php

use App\Models\PersonaBloque;
use Illuminate\Database\Seeder;

class PersonasBloquesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PersonaBloque::create([
            'bloque_id'    => 2,
            'persona_id'   => 1,
        ]);

        PersonaBloque::create([
            'bloque_id'    => 3,
            'persona_id'   => 1,
        ]);

        PersonaBloque::create([
            'bloque_id'    => 4,
            'persona_id'   => 1,
        ]);

        PersonaBloque::create([
            'bloque_id'    => 4,
            'persona_id'   => 2,
        ]);
    }
}
