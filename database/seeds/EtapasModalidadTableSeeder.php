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
            CONFGIURACION DE TIEMPOS MODALIDAD: INVITACIÓN  PUBLICA (igual o superior a 450 SMMLV)
        */

        EtapaModadalidad::create([
        'etapa_id'    => 1,
        'modalidad_id'    => 1,
        'duracionetapa'    => 5,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 2,
        'modalidad_id'    => 1,
        'duracionetapa'    => 3,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 3,
        'modalidad_id'    => 1,
        'duracionetapa'    => 5,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 5,
        'modalidad_id'    => 1,
        'duracionetapa'    => 3,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 6,
        'modalidad_id'    => 1,
        'duracionetapa'    => 3,    
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 7,
        'modalidad_id'    => 1,
        'duracionetapa'    => 7,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 8,
        'modalidad_id'    => 1,
        'duracionetapa'    => 3,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 9,
        'modalidad_id'    => 1,
        'duracionetapa'    => 2,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 10,
        'modalidad_id'    => 1,
        'duracionetapa'    => 3,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 12,
        'modalidad_id'    => 1,
        'duracionetapa'    => 1,
        ]);

        /*
            CONFGIURACION DE TIEMPOS MODALIDAD: INVITACIÓN PUBLICA (INFERIOR A 450 SMMLV) 
        */

        EtapaModadalidad::create([
        'etapa_id'    => 1,
        'modalidad_id'    => 2,
        'duracionetapa'    => 4,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 2,
        'modalidad_id'    => 2,
        'duracionetapa'    => 2,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 3,
        'modalidad_id'    => 2,
        'duracionetapa'    => 2,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 5,
        'modalidad_id'    => 2,
        'duracionetapa'    => 1,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 6,
        'modalidad_id'    => 2,
        'duracionetapa'    => 1,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 7,
        'modalidad_id'    => 2,
        'duracionetapa'    => 2,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 8,
        'modalidad_id'    => 2,
        'duracionetapa'    => 1,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 10,
        'modalidad_id'    => 2,
        'duracionetapa'    => 1,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 12,
        'modalidad_id'    => 2,
        'duracionetapa'    => 1,
        ]);

        /*
            CONFGIURACION DE TIEMPOS MODALIDAD: IINVITACIÓN PUBLICA (INFERIOR A 45 SMMLV)
        */

        EtapaModadalidad::create([
        'etapa_id'    => 1,
        'modalidad_id'    => 3,
        'duracionetapa'    => 3,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 3,
        'modalidad_id'    => 3,
        'duracionetapa'    => 1,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 5,
        'modalidad_id'    => 3,
        'duracionetapa'    => 1,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 6,
        'modalidad_id'    => 3,
        'duracionetapa'    => 1,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 7,
        'modalidad_id'    => 3,
        'duracionetapa'    => 1,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 8,
        'modalidad_id'    => 3,
        'duracionetapa'    => 1,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 10,
        'modalidad_id'    => 3,
        'duracionetapa'    => 1,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 12,
        'modalidad_id'    => 3,
        'duracionetapa'    => 1,
        ]);

        /*
            CONFGIURACION DE TIEMPOS MODALIDAD: SUBASTA A LA BAJA
        */

        EtapaModadalidad::create([
        'etapa_id'    => 1,
        'modalidad_id'    => 4,
        'duracionetapa'    => 4,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 2,
        'modalidad_id'    => 4,
        'duracionetapa'    => 2,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 3,
        'modalidad_id'    => 4,
        'duracionetapa'    => 3,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 5,
        'modalidad_id'    => 4,
        'duracionetapa'    => 3,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 6,
        'modalidad_id'    => 4,
        'duracionetapa'    => 1,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 7,
        'modalidad_id'    => 4,
        'duracionetapa'    => 2,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 8,
        'modalidad_id'    => 4,
        'duracionetapa'    => 3,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 11,
        'modalidad_id'    => 4,
        'duracionetapa'    => 1,
        ]);

        EtapaModadalidad::create([
        'etapa_id'    => 12,
        'modalidad_id'    => 4,
        'duracionetapa'    => 1,
        ]);

        /*
            CONFGIURACION DE TIEMPOS MODALIDAD: INVITACIÓN CERRADA
        */

        EtapaModadalidad::create([
            'etapa_id'    => 1,
            'modalidad_id'    => 5,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 2,
            'modalidad_id'    => 5,
            'duracionetapa'    => 3,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 4,
            'modalidad_id'    => 5,
            'duracionetapa'    => 3,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 6,
            'modalidad_id'    => 5,
            'duracionetapa'    => 1,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 7,
            'modalidad_id'    => 5,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 8,
            'modalidad_id'    => 5,
            'duracionetapa'    => 3,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 9,
            'modalidad_id'    => 5,
            'duracionetapa'    => 2,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 10,
            'modalidad_id'    => 5,
            'duracionetapa'    => 3,
        ]);

        EtapaModadalidad::create([
            'etapa_id'    => 12,
            'modalidad_id'    => 5,
            'duracionetapa'    => 1,
        ]);

        /*
            CONFGIURACION DE TIEMPOS MODALIDAD: INCUMPLIMIENTO CLAUSULA PENAL PECUNIARIA
        */

        EtapaModadalidad::create([
            'etapa_id'    => 13,
            'modalidad_id'    => 6,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 14,
            'modalidad_id'    => 6,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 15,
            'modalidad_id'    => 6,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 16,
            'modalidad_id'    => 6,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 17,
            'modalidad_id'    => 6,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 18,
            'modalidad_id'    => 6,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 19,
            'modalidad_id'    => 6,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 20,
            'modalidad_id'    => 6,
            'duracionetapa'    => 4,
        ]);

        EtapaModadalidad::create([
            'etapa_id'    => 21,
            'modalidad_id'    => 6,
            'duracionetapa'    => 4,
        ]);

        EtapaModadalidad::create([
            'etapa_id'    => 22,
            'modalidad_id'    => 6,
            'duracionetapa'    => 4,
        ]);

        /*
            CONFGIURACION DE TIEMPOS MODALIDAD: INCUMPLIMIENTO CLAUSULA PENAL DE APREMIO
        */

        EtapaModadalidad::create([
            'etapa_id'    => 13,
            'modalidad_id'    => 7,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 14,
            'modalidad_id'    => 7,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 15,
            'modalidad_id'    => 7,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 16,
            'modalidad_id'    => 7,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 17,
            'modalidad_id'    => 7,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 18,
            'modalidad_id'    => 7,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 19,
            'modalidad_id'    => 7,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 20,
            'modalidad_id'    => 7,
            'duracionetapa'    => 4,
        ]);

        EtapaModadalidad::create([
            'etapa_id'    => 21,
            'modalidad_id'    => 7,
            'duracionetapa'    => 4,
        ]);

        EtapaModadalidad::create([
            'etapa_id'    => 22,
            'modalidad_id'    => 7,
            'duracionetapa'    => 4,
        ]);        

        /*
            CONFGIURACION DE TIEMPOS MODALIDAD: INCUMPLIMIENTO CLAUSULA PENAL TERMINACION ANTICIPADA
        */

        EtapaModadalidad::create([
            'etapa_id'    => 13,
            'modalidad_id'    => 8,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 14,
            'modalidad_id'    => 8,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 15,
            'modalidad_id'    => 8,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 16,
            'modalidad_id'    => 8,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 17,
            'modalidad_id'    => 8,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 18,
            'modalidad_id'    => 8,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 19,
            'modalidad_id'    => 8,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 20,
            'modalidad_id'    => 8,
            'duracionetapa'    => 4,
        ]);

        EtapaModadalidad::create([
            'etapa_id'    => 21,
            'modalidad_id'    => 8,
            'duracionetapa'    => 4,
        ]);

        EtapaModadalidad::create([
            'etapa_id'    => 22,
            'modalidad_id'    => 8,
            'duracionetapa'    => 4,
        ]);           
        
        /*
            CONFGIURACION DE TIEMPOS MODALIDAD: CESION
        */

        EtapaModadalidad::create([
            'etapa_id'    => 13,
            'modalidad_id'    => 9,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 14,
            'modalidad_id'    => 9,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 15,
            'modalidad_id'    => 9,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 16,
            'modalidad_id'    => 9,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 17,
            'modalidad_id'    => 9,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 18,
            'modalidad_id'    => 9,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 19,
            'modalidad_id'    => 9,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 20,
            'modalidad_id'    => 9,
            'duracionetapa'    => 4,
        ]);

        EtapaModadalidad::create([
            'etapa_id'    => 21,
            'modalidad_id'    => 9,
            'duracionetapa'    => 4,
        ]);

        EtapaModadalidad::create([
            'etapa_id'    => 22,
            'modalidad_id'    => 9,
            'duracionetapa'    => 4,
        ]);        
        
        /*
            CONFGIURACION DE TIEMPOS MODALIDAD: SUSPENSION O TERMINACION MUTUO ACUERDO
        */

        EtapaModadalidad::create([
            'etapa_id'    => 13,
            'modalidad_id'    => 10,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 14,
            'modalidad_id'    => 10,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 15,
            'modalidad_id'    => 10,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 16,
            'modalidad_id'    => 10,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 17,
            'modalidad_id'    => 10,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 18,
            'modalidad_id'    => 10,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 19,
            'modalidad_id'    => 10,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 20,
            'modalidad_id'    => 10,
            'duracionetapa'    => 4,
        ]);

        EtapaModadalidad::create([
            'etapa_id'    => 21,
            'modalidad_id'    => 10,
            'duracionetapa'    => 4,
        ]);

        EtapaModadalidad::create([
            'etapa_id'    => 22,
            'modalidad_id'    => 10,
            'duracionetapa'    => 4,
        ]);             

        /*
            CONFGIURACION DE TIEMPOS MODALIDAD: OTROS
        */

        EtapaModadalidad::create([
            'etapa_id'    => 13,
            'modalidad_id'    => 11,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 14,
            'modalidad_id'    => 11,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 15,
            'modalidad_id'    => 11,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 16,
            'modalidad_id'    => 11,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 17,
            'modalidad_id'    => 11,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 18,
            'modalidad_id'    => 11,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 19,
            'modalidad_id'    => 11,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 20,
            'modalidad_id'    => 11,
            'duracionetapa'    => 4,
        ]);

        EtapaModadalidad::create([
            'etapa_id'    => 21,
            'modalidad_id'    => 11,
            'duracionetapa'    => 4,
        ]);

        EtapaModadalidad::create([
            'etapa_id'    => 22,
            'modalidad_id'    => 11,
            'duracionetapa'    => 4,
        ]);        
        
        /*
            CONFGIURACION DE TIEMPOS MODALIDAD: BALANCE FINAL Y CIERRE
        */

        EtapaModadalidad::create([
            'etapa_id'    => 13,
            'modalidad_id'    => 12,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 14,
            'modalidad_id'    => 12,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 15,
            'modalidad_id'    => 12,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 16,
            'modalidad_id'    => 12,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 17,
            'modalidad_id'    => 12,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 18,
            'modalidad_id'    => 12,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 19,
            'modalidad_id'    => 12,
            'duracionetapa'    => 4,
        ]);
    
        EtapaModadalidad::create([
            'etapa_id'    => 20,
            'modalidad_id'    => 12,
            'duracionetapa'    => 4,
        ]);

        EtapaModadalidad::create([
            'etapa_id'    => 21,
            'modalidad_id'    => 12,
            'duracionetapa'    => 4,
        ]);

        EtapaModadalidad::create([
            'etapa_id'    => 22,
            'modalidad_id'    => 12,
            'duracionetapa'    => 4,
        ]);               
    }
}
