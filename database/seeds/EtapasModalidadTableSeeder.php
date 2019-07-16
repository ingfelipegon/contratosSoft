<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\EtapaModadalidad;

class EtapasModalidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*
            CONFGIURACION DE TIEMPOS MODALIDAD: INVITACIÓN COMPETITIVA PUBLICA
        */

        EtapaModadalidad::create([
        'etapa_id'    => 1,
        'modalidad_id'    => 1,
        'duracionetapa'    => 5,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 2,
        'modalidad_id'    => 1,
        'duracionetapa'    => 5,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 3,
        'modalidad_id'    => 1,
        'duracionetapa'    => 0,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 4,
        'modalidad_id'    => 1,
        'duracionetapa'    => 3,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 5,
        'modalidad_id'    => 1,
        'duracionetapa'    => 5,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 6,
        'modalidad_id'    => 1,
        'duracionetapa'    => 5,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 7,
        'modalidad_id'    => 1,
        'duracionetapa'    => 3,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 8,
        'modalidad_id'    => 1,
        'duracionetapa'    => 2,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 9,
        'modalidad_id'    => 1,
        'duracionetapa'    => 3,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 10,
        'modalidad_id'    => 1,
        'duracionetapa'    => 0,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 11,
        'modalidad_id'    => 1,
        'duracionetapa'    => 1,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 12,
        'modalidad_id'    => 1,
        'duracionetapa'    => 3,
        ]);

        /*
            CONFGIURACION DE TIEMPOS MODALIDAD: INVITACIÓN COMPETITIVA PUBLICA (INFERIOR A 100 SMMLV) 
        */

        EtapaModadalidad::create([
        'etapa_id'    => 1,
        'modalidad_id'    => 2,
        'duracionetapa'    => 3,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 2,
        'modalidad_id'    => 2,
        'duracionetapa'    => 1,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 3,
        'modalidad_id'    => 2,
        'duracionetapa'    => 0,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 4,
        'modalidad_id'    => 2,
        'duracionetapa'    => 1,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 5,
        'modalidad_id'    => 2,
        'duracionetapa'    => 1,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 6,
        'modalidad_id'    => 2,
        'duracionetapa'    => 2,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 7,
        'modalidad_id'    => 2,
        'duracionetapa'    => 1,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 8,
        'modalidad_id'    => 2,
        'duracionetapa'    => 0,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 9,
        'modalidad_id'    => 2,
        'duracionetapa'    => 1,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 10,
        'modalidad_id'    => 2,
        'duracionetapa'    => 0,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 11,
        'modalidad_id'    => 2,
        'duracionetapa'    => 1,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 12,
        'modalidad_id'    => 2,
        'duracionetapa'    => 2,
        ]);

        /*
            CONFGIURACION DE TIEMPOS MODALIDAD: INVITACIÓN COMPETITIVA PUBLICA (SUBASTA A LA BAJA) 
        */

        EtapaModadalidad::create([
        'etapa_id'    => 1,
        'modalidad_id'    => 3,
        'duracionetapa'    => 3,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 2,
        'modalidad_id'    => 3,
        'duracionetapa'    => 5,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 3,
        'modalidad_id'    => 3,
        'duracionetapa'    => 0,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 4,
        'modalidad_id'    => 3,
        'duracionetapa'    => 3,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 5,
        'modalidad_id'    => 3,
        'duracionetapa'    => 3,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 6,
        'modalidad_id'    => 3,
        'duracionetapa'    => 3,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 7,
        'modalidad_id'    => 3,
        'duracionetapa'    => 3,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 8,
        'modalidad_id'    => 3,
        'duracionetapa'    => 0,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 9,
        'modalidad_id'    => 3,
        'duracionetapa'    => 0,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 10,
        'modalidad_id'    => 3,
        'duracionetapa'    => 2,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 11,
        'modalidad_id'    => 3,
        'duracionetapa'    => 1,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 12,
        'modalidad_id'    => 3,
        'duracionetapa'    => 3,
        ]);

        /*
            CONFGIURACION DE TIEMPOS MODALIDAD: INVITACIÓN COMPETITIVA CERRADA
        */

        EtapaModadalidad::create([
        'etapa_id'    => 1,
        'modalidad_id'    => 4,
        'duracionetapa'    => 5,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 2,
        'modalidad_id'    => 4,
        'duracionetapa'    => 5,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 3,
        'modalidad_id'    => 4,
        'duracionetapa'    => 0,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 4,
        'modalidad_id'    => 4,
        'duracionetapa'    => 0,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 5,
        'modalidad_id'    => 4,
        'duracionetapa'    => 1,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 6,
        'modalidad_id'    => 4,
        'duracionetapa'    => 3,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 7,
        'modalidad_id'    => 4,
        'duracionetapa'    => 3,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 8,
        'modalidad_id'    => 4,
        'duracionetapa'    => 0,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 9,
        'modalidad_id'    => 4,
        'duracionetapa'    => 1,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 10,
        'modalidad_id'    => 4,
        'duracionetapa'    => 0,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 11,
        'modalidad_id'    => 4,
        'duracionetapa'    => 1,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 12,
        'modalidad_id'    => 4,
        'duracionetapa'    => 3,
        ]);
    }
}
