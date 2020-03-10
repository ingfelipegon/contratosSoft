<?php

namespace App\Http\Controllers\AdminApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Solicitud;
use App\Http\Resources\EtapasResource;
use App\Http\Resources\MovimientoResource;
use App\Models\Etapa;
use App\Models\EtapaModadalidad;
use App\Models\Modalidad;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class SolicitudMovimientosEtapasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Solicitud $solicitude)
    {
        Log::info('ingreso a consultra proxima etapa por modalidad');
        $movimientos = $solicitude->movimientos;         
        
        if($movimientos->count()){
            //CONSULTA LAS ETAPAS YA REALIZADAS O ACTUALES POR EL ABOGADO
            $etapasMovimiento = $solicitude->movimientos()->with('etapa')->get()->pluck('etapa');   
            //CONSULTA ETAPAS POR MODALIDAD
            $etapasModalidad = EtapaModadalidad::where('modalidad_id', $solicitude->modalidad_id)->get();   
            foreach ($etapasMovimiento as $etapaMovimiento) {
                $data[] = $etapaMovimiento->id;                  
                // $etapasModalidad
                // $etapasModalidad->forget('etapa_id', $etapaMovimiento->id);      	                            
            }
            //CONSULTA DE ETAPAS QUE FALTAN POR SER REGSITRADAS    
            $etapasModalidadPorRegistrar = $etapasModalidad->whereNotIn('etapa_id', $data)->first(); 
            $etapaPorRegistrar = Etapa::where('id', $etapasModalidadPorRegistrar->etapa_id)->get();
            // Log::info('ingreso porque es null');
        }   
        else{
            $etapasModalidad = EtapaModadalidad::where('modalidad_id', $solicitude->modalidad_id)->get();  
            foreach ($etapasModalidad as $etapaModalidad) {
                $data[] = $etapaModalidad->etapa_id;                  	                            
            }
            $etapaPorRegistrar = Etapa::where('id', $data)->get();
            
        }

        //CONSULTA ETAPAS POR MODALIDAD
        // $etapasModalidad = EtapaModadalidad::where('modalidad_id', $solicitude->modalidad_id)->get();   
        // return $data;
        
        // return $movimientos;
        // $model = App\Flight::where('legs', '>', 100)->firstOrFail();
        //->modalidad_id->etapas()
        return EtapasResource::collection($etapaPorRegistrar);        
    }
}
