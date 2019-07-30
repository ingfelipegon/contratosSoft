<?php

namespace App\Http\Controllers\AdminApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Solicitud;
use App\Http\Resources\SolicitudeResource;
use App\Models\Adquisicion;

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
        return response(['message'=>'Solicitud de contratación ha sido creada correctamente', 'solicitud'=>$solicitud]);
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

        return response(['message'=>'Solicitud de contratación ha sido ', 'solicitud'=>$solicitude]);
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
        return response(['message'=>'El Item de la solcitud seleccionada ha eliminado correctamente', 'solicitud'=>$solicitude]);
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
