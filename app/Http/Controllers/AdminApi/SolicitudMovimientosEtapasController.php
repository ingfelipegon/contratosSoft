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

        if($movimientos->count()){
            $etapasMovimiento = $solicitude->movimientos()->with('etapa')->get()->pluck('etapa');    
            foreach ($etapasMovimiento as $etapaMovimiento) {
                $data[] = $etapaMovimiento->id;            	            
            }
            $etapasAll = $etapasAll->diff(Etapa::whereIn('id', $data)->get());    
        }
        return EtapasResource::collection($etapasAll);        
    }
}
