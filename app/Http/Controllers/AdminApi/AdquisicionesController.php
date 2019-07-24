<?php

namespace App\Http\Controllers\AdminApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Adquisicion;
use App\Http\Resources\AdquisicionResource;

class AdquisicionesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Adquisicion $adquisicion)
    {
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
            'mesinicio' => 'required|integer|min:1',			
            'mesoferta' => 'required|integer|min:1',
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
        }
        if($data['vigenciafutura'] == "No"){
            $data['vigenciafutura'] = false;
        }

        $adquisicion = Adquisicion::create($data);
        return response(['message'=>'Plan de adquisision creado', 'adquisision'=>$adquisicion]);
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
            'mesinicio' => 'required|integer|min:1',			
            'mesoferta' => 'required|integer|min:1',
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
        $adquisicione->update($data);

        return response(['message'=>'Plan de adquisision actualizado', 'adquisision'=>$adquisicione]);
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
        return response(['message'=>'El Item de adquisision se ha eliminado correctamente', 'adquisision'=>$adquisicione]);
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
        return response(['data'=>$adquisicione]);
        //return response()->json(['data'=>$adquisicionRegistro], 200);
    }
    
}
