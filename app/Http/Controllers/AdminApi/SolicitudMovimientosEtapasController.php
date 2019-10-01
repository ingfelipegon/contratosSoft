<?php

namespace App\Http\Controllers\AdminApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Solicitud;
use App\Http\Resources\EtapasResource;
use App\Models\Etapa;
use Illuminate\Support\Arr;

class SolicitudMovimientosEtapasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Solicitud $solicitude)
    {
        $movimientos = $solicitude->movimientos;     
        $etapasAll = Etapa::all();

        if($solicitude->tipotramite_id == 1){   //PRECONTRACTUAL
            $etapasAll = $etapasAll->whereIn('id', array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12)); 
        }    

        if($solicitude->tipotramite_id == 2){   //POSCONTRACTUAL
            $etapasAll = $etapasAll->whereIn('id', array(13, 14, 15, 16, 17, 18, 19, 20, 21, 22)); 
        }           

        if($movimientos->count()){
            $etapasMovimiento = $solicitude->movimientos()->with('etapa')->get()->pluck('etapa');    
            foreach ($etapasMovimiento as $etapaMovimiento) {
                $data[] = $etapaMovimiento->id;            	            
            }
            $etapasAll = $etapasAll->diff(Etapa::whereIn('id', $data)->get());    
            // $etapasAll = $etapasAll->whereIn('id', array(13,14,15,16,17,18,19,20,21,22));     
        }   

        return EtapasResource::collection($etapasAll);        
    }
}
