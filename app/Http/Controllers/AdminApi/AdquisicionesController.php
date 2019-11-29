<?php

namespace App\Http\Controllers\AdminApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Adquisicion;
use App\Http\Resources\AdquisicionResource;
use App\Models\LogAdquisicion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdquisicionesController extends Controller
{


    public function obtenerIdAdquisicion( $item)
    {
        $idAdquisicionItem = 0;
        $adquisicion = Adquisicion::where('item', $item)
                                            ->get()->first();
        if(!empty($adquisicion->id))
        {
            $idAdquisicionItem = $adquisicion->id;
            return $idAdquisicionItem;                        //EXISTE LA ADQUISICION ASOCIADA AL ITEM, RETORMA EL ID
        }                                                       
        else
        {return 0;}                                           //NO EXISTE LA ADQUISICION ASOCIADA AL ITEM, RETORNA 0
    }          

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Adquisicion $adquisicion)
    {
        $user_connected = Auth::user();
        Log::info('el usuario conectado es: ');
        Log::info($user_connected);

        $adquisiciones = Adquisicion::all();        
        return AdquisicionResource::collection($adquisiciones);
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
            'codUNSPSC' => 'required',		
            'item' => 'required|integer|min:1',					
            'descripcion' => 'required',	
            // 'mesinicio' => 'required|integer|min:1',			
            // 'mesoferta' => 'required|integer|min:1',
            'duracion' => 'required|integer|min:1',
            'valortotal' => 'required',
            'valorvigencia' => 'required',
            'vigenciafutura' => 'required',
            'nombreresponsable' => 'required',
            'estadovigencia' => 'required',
            'unidadtiempo_id' => 'required|integer|min:1',
            'modalidad_id' => 'required|integer|min:1',
            'fuente_id' => 'required|integer|min:1'
        ];

        $this->validate($request, $rules);        

        $data = $request->all();       
        if($data['vigenciafutura'] == "Si"){
            $data['vigenciafutura'] = true;
            // $adquisicionLog->estadovigencia = true;
        }
        if($data['vigenciafutura'] == "No"){
            $data['vigenciafutura'] = false;
            // $adquisicionLog->estadovigencia = false;
        }

        $adquisicion = Adquisicion::create($data);

        //INSERTAMOS DATOS EN LOG DE ADQUISICIONES
        $adquisicionLog = new LogAdquisicion();
        $adquisicionLog->codUNSPSC = $adquisicion->codUNSPSC;
        $adquisicionLog->item = $adquisicion->item;        
        $adquisicionLog->descripcion = $adquisicion->descripcion;
        $adquisicionLog->mes_inicio_id = $adquisicion->mes_inicio_id;
        $adquisicionLog->mes_oferta_id = $adquisicion->mes_oferta_id;
        $adquisicionLog->numero_proceso = $adquisicion->numero_proceso;
        $adquisicionLog->numero_contrato = $adquisicion->numero_contrato;
        $adquisicionLog->duracion = $adquisicion->duracion;
        $adquisicionLog->valortotal = $adquisicion->valortotal;
        $adquisicionLog->valorvigencia = $adquisicion->valorvigencia;
        $adquisicionLog->vigenciafutura = $adquisicion->vigenciafutura;
        $adquisicionLog->nombreresponsable = $adquisicion->nombreresponsable;   
        $adquisicionLog->estadovigencia = $adquisicion->estadovigencia;
        $adquisicionLog->unidadtiempo_id = $adquisicion->unidadtiempo_id;
        $adquisicionLog->modalidad_id = $adquisicion->modalidad_id;
        $adquisicionLog->modalidad_id = $adquisicion->modalidad_id;
        $adquisicionLog->fuente_id = $adquisicion->fuente_id;
        $adquisicionLog->abogado_id = $adquisicion->abogado_id;
        $adquisicionLog->adquisicion_id = $adquisicion->id;
        $adquisicionLog->save();

        return response(['message'=>'Plan de adquisision creado', 'adquisision'=>new AdquisicionResource($adquisicion)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adquisicion $adquisicione)
    {
        $rules = [
            'codUNSPSC' => 'required',		
            'item' => 'required|integer|min:1',					
            'descripcion' => 'required',	
            // 'mesinicio' => 'required|integer|min:1',			
            // 'mesoferta' => 'required|integer|min:1',
            'duracion' => 'required|integer|min:1',
            'valortotal' => 'required',
            'valorvigencia' => 'required',
            'vigenciafutura' => 'required',
            'nombreresponsable' => 'required',
            'estadovigencia' => 'required',
            'unidadtiempo_id' => 'required|integer|min:1',
            'modalidad_id' => 'required|integer|min:1',
            'fuente_id' => 'required|integer|min:1'
        ];

        $this->validate($request, $rules);
        $data = $request->all();
        // Log::info('El mes de inicio es : '.$data['mesinicio']);

        if($data['vigenciafutura'] == "Si"){
            $data['vigenciafutura'] = true;
        }
        if($data['vigenciafutura'] == "No"){
            $data['vigenciafutura'] = false;
        }
        // Log::info('El mes de inicio es : '.$data['mesinicio']);
        // Log::info('El Id del mes de inicio es : '.$data['mesinicio']);
        $adquisicione->update($data);

        //INSERTAMOS DATOS EN LOG DE ADQUISICIONES
        $adquisicionLog = new LogAdquisicion();
        $adquisicionLog->codUNSPSC = $adquisicione->codUNSPSC;
        $adquisicionLog->item = $adquisicione->item;        
        $adquisicionLog->descripcion = $adquisicione->descripcion;
        $adquisicionLog->mes_inicio_id = $adquisicione->mes_inicio_id;
        $adquisicionLog->mes_oferta_id = $adquisicione->mes_oferta_id;
        $adquisicionLog->numero_proceso = $adquisicione->numero_proceso;
        $adquisicionLog->numero_contrato = $adquisicione->numero_contrato;
        $adquisicionLog->duracion = $adquisicione->duracion;
        $adquisicionLog->valortotal = $adquisicione->valortotal;
        $adquisicionLog->valorvigencia = $adquisicione->valorvigencia;
        $adquisicionLog->vigenciafutura = $adquisicione->vigenciafutura;
        $adquisicionLog->nombreresponsable = $adquisicione->nombreresponsable;   
        $adquisicionLog->estadovigencia = $adquisicione->estadovigencia;
        $adquisicionLog->unidadtiempo_id = $adquisicione->unidadtiempo_id;
        $adquisicionLog->modalidad_id = $adquisicione->modalidad_id;
        $adquisicionLog->modalidad_id = $adquisicione->modalidad_id;
        $adquisicionLog->fuente_id = $adquisicione->fuente_id;
        $adquisicionLog->abogado_id = $adquisicione->abogado_id;
        $adquisicionLog->adquisicion_id = $adquisicione->id;
        $adquisicionLog->save();

        $res_adquisicion=new AdquisicionResource($adquisicione);

        return response(['message'=>'Plan de adquisision actualizado', 'adquisision'=>$res_adquisicion]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adquisicion $adquisicione)
    {
        $adquisicione->delete();
        return response(['message'=>'El Item de adquisision se ha eliminado correctamente', 'adquisision'=>new AdquisicionResource($adquisicione)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Adquisicion $adquisicione)
    {
        //$adquisicionRegistro = Adquisicion::find($id);
        // return response()->json(['data'=>$area], 200);
        return response(['data'=>new AdquisicionResource($adquisicione)]);
        //return response()->json(['data'=>$adquisicionRegistro], 200);
    }
    
}
