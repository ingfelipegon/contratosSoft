<?php

namespace App\Http\Controllers\AdminApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MovimientoResource;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\Solicitud;
use Illuminate\Support\Carbon;
use App\Models\EstadoOperacion;
use Illuminate\Support\Facades\Log;

class SolicitudMovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Solicitud $solicitude)
    {        
        //DECLARACION DE CONSTANTES
        $idOperacionEtapa = 0;              // ID OPERACION ETAPA

        $topeComienzoEtapa = 0.25;          //25%   ETAPA DEL PROCESO INCIADA
        $topeEtapaEnTiempo = 0.5;           //50%   ETAPA DEL PROCESO EN TIENPO PARA INCIAR      
        $topeIniciarYaEtapa = 0.75;         //75%   ETAOA DEL PROCESO YA DEBE COMENZAR
        
        $horasTopeComienzoEtapa = 0;        //HORAS LIMITE PARA COMENZAR ETAPA
        $horasTopeEtapaEnTiempo = 0;        //HORAS LIMITE ETAPA EN TIEMPO
        $horasTopeIniciarYaEtapa = 0;       //HORAS TOPE PARA INICIAR ETAPA YA

        $stringComienzoEtapa = 'COMENZAR ETAPA';
        $stringEtapaEnTiempo = 'ETAPA EN TIEMPO';
        $stringIniciarYaEtapa = 'INICIO ETAPA';   
        $stringSuperaEtapa = 'SUPERA ETAPA';
        $stringEtapaFinalizada = 'ETAPA FINALIZADA';
        
                
        $movimientos = $solicitude->movimientos;     
        if ($movimientos->count()) { 
            $movimiento = $solicitude->movimientos->last(); 
            $estadoOperacion =  $movimiento->estadooperacion_id;  
            if($estadoOperacion != 5){
                //ACTUALIZA ETAPA PORQUE NO FINALIZA        
                $duracionDiasEtapaActual =  $movimiento->duracionetapa;
                $duracionHorasEtapaActual =  $duracionDiasEtapaActual * 24;
                $fechaEtapaAsiganda = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $movimiento->created_at);
                $fechaActual = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', Carbon::now());
                $horasLlevaEtapaIniciada = $fechaEtapaAsiganda->diffInHours($fechaActual);
        
                $horasTopeComienzoEtapa = $duracionHorasEtapaActual * $topeComienzoEtapa;
                $horasTopeEtapaEnTiempo = $duracionHorasEtapaActual * $topeEtapaEnTiempo;
                $horasTopeIniciarYaEtapa = $duracionHorasEtapaActual * $topeIniciarYaEtapa;
        
                if($horasLlevaEtapaIniciada > $duracionHorasEtapaActual){
                    //ACTUALIZA ESTADO DE OPERACION DE LA ETAPA
                    $idOperacionEtapa = EstadoOperacion::where('nombre', $stringSuperaEtapa)
                    ->orWhere('nombre', 'like', '%' . $stringSuperaEtapa . '%')->get()->first()->id;
                    //ACTUALIZA ESTADO DE OPERACION DE LA ETAPA
                    $movimiento->estadooperacion_id = $idOperacionEtapa;
                    $movimiento->save();            
                    $solicitude->estadooperacion_id = $idOperacionEtapa;
                    $solicitude->save();            
                }
                else if($horasLlevaEtapaIniciada >= $horasTopeIniciarYaEtapa){
                    //ACTUALIZA ESTADO DE OPERACION DE LA ETAPA
                    $idOperacionEtapa = EstadoOperacion::where('nombre', $stringIniciarYaEtapa)
                    ->orWhere('nombre', 'like', '%' . $stringIniciarYaEtapa . '%')->get()->first()->id;
                    //ACTUALIZA ESTADO DE OPERACION DE LA ETAPA
                    $movimiento->estadooperacion_id = $idOperacionEtapa;            
                    $movimiento->save();    
                    $solicitude->estadooperacion_id = $idOperacionEtapa;
                    $solicitude->save();           
                }
                else if($horasLlevaEtapaIniciada >= $horasTopeEtapaEnTiempo){
                    //ACTUALIZA ESTADO DE OPERACION DE LA ETAPA
                    $idOperacionEtapa = EstadoOperacion::where('nombre', $stringEtapaEnTiempo)
                    ->orWhere('nombre', 'like', '%' . $stringEtapaEnTiempo . '%')->get()->first()->id;
                    //ACTUALIZA ESTADO DE OPERACION DE LA ETAPA
                    $movimiento->estadooperacion_id = $idOperacionEtapa;            
                    $movimiento->save();   
                    $solicitude->estadooperacion_id = $idOperacionEtapa;
                    $solicitude->save();            
                }
                else if($horasLlevaEtapaIniciada >= $horasTopeComienzoEtapa || $horasLlevaEtapaIniciada == 0){
                    //CONSULTA 
                    $idOperacionEtapa = EstadoOperacion::where('nombre', $stringComienzoEtapa)
                    ->orWhere('nombre', 'like', '%' . $stringComienzoEtapa . '%')->get()->first()->id;
                    //ACTUALIZA ESTADO DE OPERACION DE LA ETAPA
                    $movimiento->estadooperacion_id = $idOperacionEtapa;            
                    $movimiento->save();
                    $solicitude->estadooperacion_id = $idOperacionEtapa;
                    $solicitude->save();   
                }    
            }else{
                //ACTUALIZA ESTADO EN LA SOLICITUD
                $solicitude->estadooperacion_id = $estadoOperacion;
                $solicitude->save();   
            }

            
        } 
        // return response()->json($movimiento,200);	   
        return MovimientoResource::collection($movimientos);
    }
}
