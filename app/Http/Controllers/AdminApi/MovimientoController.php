<?php

namespace App\Http\Controllers\AdminApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Movimiento;
use App\Http\Resources\MovimientoResource;
use App\Models\EtapaModadalidad;
use App\Models\Solicitud;

class MovimientoController extends Controller
{

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Movimiento $movimiento)
    {
        $movimientos = Movimiento::all();
        return MovimientoResource::collection($movimientos);
    }

    public function obtenerDiasEtapa( $idModalidad, $idEtapa)
    {
        $duracionTiempoEtapa = 0;
        $etapaModalidad = EtapaModadalidad::where('etapa_id', $idEtapa)
                                            ->where('modalidad_id', $idModalidad)
                                            ->get()->first();
        if(!empty($etapaModalidad->duracionetapa))
        {
            $duracionTiempoEtapa = $etapaModalidad->duracionetapa;
            return $duracionTiempoEtapa;                        //EXISTE RETORNA DURACION ETAPA
        }                                                       
        else
        {return 0;}                                             //NO EXISTE RETORNA 0
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
            'descripcion' => 'required',	
            'duracionetapa' => 'required|integer|min:1',
            'modalidad_id' => 'required|integer|min:1',
            'estadooperacion_id' => 'required|integer|min:1',
            'etapa_id' => 'required|integer|min:1',
            'respopnsable_id' => 'required|integer|min:1',                        
        ];


        $this->validate($request, $rules);
        $data = $request->all();

        $idSolicitud = $data['solicitud_id'];
        // $idEstadooperacion = $data['estadooperacion_id'];
        $idResponsable = $data['respopnsable_id'];
        $solicitud = Solicitud::where('id', $idSolicitud)->get()->first();
        // $solicitud->estadooperacion_id = $idEstadooperacion;
        $solicitud->respopnsable_id = $idResponsable;
        $solicitud->save();   

        $movimiento = Movimiento::create($data);
        return response(['message'=>'La etapa del actual proceso de contratación ha sido creada correctamente', 'movimiento'=>new MovimientoResource($movimiento)]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movimiento $movimiento)
    {
        $rules = [
            'descripcion' => 'required',	
            'duracionetapa' => 'required|integer|min:1',
            'modalidad_id' => 'required|integer|min:1',
            'estadooperacion_id' => 'required|integer|min:1',
            'etapa_id' => 'required|integer|min:1',
            'respopnsable_id' => 'required|integer|min:1',                        
        ];

        $this->validate($request, $rules);
        $data = $request->all();

        // $idSolicitud = $movimiento->solicitud_id;
        // $idEstadooperacion = $data['estadooperacion_id'];
        // $idResponsable = $data['respopnsable_id'];
        // $solicitud = Solicitud::where('id', $idSolicitud)->get()->first();
        
        // $solicitud->estadooperacion_id = $idEstadooperacion;
        // $solicitud->respopnsable_id = $idResponsable;
        // $solicitud->save();   
        

        $movimiento->update($data);
        $idSolicitud = $movimiento->solicitud_id;
        $idEstadooperacion = $data['estadooperacion_id'];
        $idResponsable = $data['respopnsable_id'];
        $solicitud = Solicitud::find($idSolicitud)->first();
        $solicitud->estadooperacion_id = $idEstadooperacion;
        $solicitud->respopnsable_id = $idResponsable;
        $solicitud->save();   

        return response(['message'=>'La etapa del actual proceso de contratación ha sido actualizada', 'movimiento'=>new MovimientoResource($movimiento)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movimiento  $movimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movimiento $movimiento)
    {
        $movimiento->delete();
        return response(['message'=>'La etapa del actual proceso de contratación ha eliminado correctamente', 'movimiento'=>new MovimientoResource($movimiento)]);
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movimiento $movimiento)
    {
        return new MovimientoResource($movimiento);
    }


}
