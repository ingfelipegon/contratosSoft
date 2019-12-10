<?php

namespace App\Http\Controllers\AdminApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Solicitud;
use App\Http\Resources\SolicitudeResource;
use App\Models\Adquisicion;
use App\Models\LogSolicitud;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SolicitudesController extends Controller
{

    public function verificar_registro_PAA($item)
    {
        //BUSCA QUE ITEM A REGISTRAR ESTE EN EL PAA
        $encontrado=Adquisicion::where('item',$item)->first();
        if(!empty($encontrado->id))
        {return 1;}             //EXISTE RETORNA 1
        else
        {return 0;}             //NO EXISTE RETORNA 0
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Solicitud $solicitude)
    {
        $solicitudes = Solicitud::all();        
        $solicitudes = $solicitudes->where('tipotramite_id', 1); 
        return SolicitudeResource::collection($solicitudes);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function solicitudesPrePost()
    {
        $solicitudes = Solicitud::all();        
        return SolicitudeResource::collection($solicitudes);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_connected = Auth::user();
        Log::info('el usuario conectado en solcitudes es: ');
        Log::info($user_connected);

        $rules = [
            'item' => 'required|integer|min:1',					
            'descripcion' => 'required',	
            'duracioncontrato' => 'required|integer|min:1',			
            'nombresupervisor' => 'required',
            'tienereparto' => 'required',
            'modalidad_id' => 'required|integer|min:1',
            'estadoproceso_id' => 'required|integer|min:1',
            'estadooperacion_id' => 'required|integer|min:1',
            'areasolicitante_id' => 'required|integer|min:1',
            'respopnsable_id' => 'required|integer|min:1',
            'tipotramite_id' => 'required|integer|min:1',
        ];


        $this->validate($request, $rules);
        $data = $request->all();
        if($data['tienereparto'] == 1){
            $data['tienereparto'] = true;
        }
        if($data['tienereparto'] == 0){
            $data['tienereparto'] = false;
        }    

        $solicitud = Solicitud::create($data);

        //INSERTAMOS DATOS EN LOG DE SOLICITUDES
        $solicitudLog = new LogSolicitud();
        $solicitudLog->item = $solicitud->item;
        $solicitudLog->descripcion = $solicitud->descripcion;    
        $solicitudLog->observacion = $solicitud->observacion;    
        $solicitudLog->duracioncontrato = $solicitud->duracioncontrato;
        $solicitudLog->nombresupervisor = $solicitud->nombresupervisor;
        $solicitudLog->tienereparto = $solicitud->tienereparto;
        $solicitudLog->modalidad_id = $solicitud->modalidad_id;
        $solicitudLog->estadoproceso_id = $solicitud->estadoproceso_id;
        $solicitudLog->estadooperacion_id = $solicitud->estadooperacion_id;
        $solicitudLog->areasolicitante_id = $solicitud->areasolicitante_id;
        $solicitudLog->respopnsable_id = $solicitud->respopnsable_id;
        $solicitudLog->tipotramite_id = $solicitud->tipotramite_id;
        $solicitudLog->solicitud_id = $solicitud->id;   
        $solicitudLog->usuarioNovedad_id = $user_connected->id;
        $solicitudLog->save();


        return response(['message'=>'Solicitud de contratación ha sido creada correctamente', 'solicitud'=>new SolicitudeResource($solicitud)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitud $solicitude)
    {
        $rules = [
            'item' => 'required|integer|min:1',					
            'descripcion' => 'required',	
            'duracioncontrato' => 'required|integer|min:1',			
            'nombresupervisor' => 'required',
            //'tienereparto' => 'required|integer|min:1',
            'modalidad_id' => 'required|integer|min:1',
            'estadoproceso_id' => 'required|integer|min:1',
            'estadooperacion_id' => 'required|integer|min:1',
            'areasolicitante_id' => 'required|integer|min:1',
            'respopnsable_id' => 'required|integer|min:1',
            'tipotramite_id' => 'required|integer|min:1',
        ];

        $this->validate($request, $rules);
        $data = $request->all();
        $solicitude->update($data);
        $idResponsable = $data['respopnsable_id'];
        $movimientos = $solicitude->movimientos;  
        if ($movimientos->count()) { 
            $movimiento = $solicitude->movimientos->last(); 
            $movimiento->respopnsable_id = $idResponsable;
            $movimiento->save();  
        }        

        return response(['message'=>'Solicitud de contratación ha sido actualizado correctamente', 'solicitud'=>new SolicitudeResource($solicitude)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitud $solicitude)
    {
        $solicitude->delete();
        return response(['message'=>'El Item de la solcitud seleccionada ha eliminado correctamente', 'solicitud'=>new SolicitudeResource($solicitude)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitud $solicitude)
    {
        // return SolicitudeResource::collection($solicitude);
        // return response(['data'=>$solicitude]);
        return new SolicitudeResource($solicitude);
    }
    
}
