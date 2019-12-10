<?php

namespace App\Http\Controllers\Traslado;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bloque;
use App\Models\Persona;
use App\Models\Respuesta;
use App\Models\Traslado;
use Illuminate\Support\Facades\DB;

class TrasladoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Bloque $bloque, Persona $persona)
    {
        $bloques = $persona->bloques()
                        ->get();
                        // ->unique()
                        // ->values();

        return response()->json(['data'=>$bloques], 200);        
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $camposTraslado = $request->all();
        $traslado = new Traslado();
        $traslado = DB::transaction(function() use ($camposTraslado, $traslado)
        {
            $objTraslado = new Traslado();
            $objTraslado->bloque_id = $camposTraslado['bloque_id'];
            $objTraslado->persona_id = $camposTraslado['persona_id'];     
            $objTraslado->representante_id = $camposTraslado['representante_id'];  
            $objTraslado->observaciones = $camposTraslado['observaciones'];                  
            $objTraslado->save();
            
            if(isset($camposTraslado['respuestas'])){
                foreach ( $camposTraslado['respuestas'] as $respuesta) {
                    $objRespuesta = new Respuesta();
                    $objRespuesta->respuesta = $respuesta->respuesta;    
                    $objRespuesta->traslado_id = $objTraslado->id;   
                    $objRespuesta->pregunta_id = $respuesta->pregunta_id;   
                    $objRespuesta->fase_id = $respuesta->fase_id;    
                    $objRespuesta->save();
                }
            }

            $traslado = $objTraslado;
            return $traslado;

        });                

        return response(['message'=>'El traslado se registro correctamente', 'traslado'=>$traslado]);
    }
}
