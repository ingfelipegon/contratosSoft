<?php

namespace App\Http\Controllers\Traslado;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bloque;
use App\Models\Persona;
use App\Models\RepresentantePersona;
use App\Models\Respuesta;
use App\Models\Traslado;
use Illuminate\Support\Facades\DB;

class TrasladoController extends Controller
{    
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $traslados = $request->all();
        $trasladosRegistrados = [];
        $trasladosRegistrados = DB::transaction(function() use ($traslados, $trasladosRegistrados)
        {
            //CONSULTO EL ID DE LA PERSONA CONECTADA
            $user_connected = Auth::guard('persona')->user();
            Log::info('el usuario conectado es: ');
            Log::info($user_connected);


            foreach ( $traslados as $traslado) {

                //CONSULTO EL REPRESENTANTE DE LA PERSONA VICTIMA
                $idPersona = $user_connected->id;
                $representantePersona = RepresentantePersona::where('persona_id', $idPersona)->get()->first();

                //RECORRO LOS TRASLADOS A REGISTRAR Y LOS ALMACENO EN LA TABLA REGISTRO
                $objTraslado = new Traslado();
                $objTraslado->bloque_id = $traslado['bloque_id'];
                $objTraslado->persona_id = $idPersona;     
                $objTraslado->representante_id = $representantePersona->representante_id;  
                $objTraslado->observaciones = '';                  
                $objTraslado->save();
                $trasladosRegistrados->push($objTraslado);

                //RECORRO LA COLECCION DE RESPUESTAS Y LA INDEXO AL TRASLADO PREVIMENTE REGISTRADO
                if(isset($traslado['respuestas'])){
                    foreach ( $traslado['respuestas'] as $respuesta) {
                        $objRespuesta = new Respuesta();
                        $objRespuesta->respuesta = $respuesta->respuesta;    
                        $objRespuesta->traslado_id = $objTraslado->id;   
                        $objRespuesta->pregunta_id = $respuesta->pregunta_id;   
                        $objRespuesta->fase_id = $respuesta->fase_id;    
                        $objRespuesta->save();
                    }
                }
            }            
            //RETORNO OBJETO DE TRASLADOS ALMACENADOS PREVIAMENTE CON SU RESPECTIVA LLAVE UNICA
            return $trasladosRegistrados;
        });                

        return response(['message'=>'El traslado se registro correctamente', 'traslados'=>$trasladosRegistrados]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Traslado  $traslado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Traslado $traslado)
    {
        $data = $request->all();
        $idTraslado = $data['id'];
        // Log::info('El mes de inicio es : '.$data['mesinicio']);
                
        $traslado = Traslado::where('id', $idTraslado)->get()->first();        
        $traslado->observaciones = $data['observaciones'];;
        $traslado->save();   
        return response(['message'=>'El traslado se actuolizo correctamente', 'traslado'=>$traslado]);
    }
}
