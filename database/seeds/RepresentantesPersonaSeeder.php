<?php

use App\Models\RepresentantePersona;
use Illuminate\Database\Seeder;

class RepresentantesPersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RepresentantePersona::create([
            'representante_id'    => 1,
            'persona_id'          => 1,
        ]);

        RepresentantePersona::create([
            'representante_id'    => 1,
            'persona_id'          => 2,
        ]);

        RepresentantePersona::create([
            'representante_id'    => 2,
            'persona_id'          => 1,
        ]);

        RepresentantePersona::create([
            'representante_id'    => 2,
            'persona_id'          => 2,
        ]);
    }
}
