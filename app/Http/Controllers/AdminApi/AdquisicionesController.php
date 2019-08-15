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
        if($data['mesinicio'] == "Enero"){
            $data['mesinicio'] = 1;
        }
        if($data['mesinicio'] == "Febrero"){
            $data['mesinicio'] = 2;
        }
        if($data['mesinicio'] == "Marzo"){
            $data['mesinicio'] = 3;
        }
        if($data['mesinicio'] == "Abríl"){
            $data['mesinicio'] = 4;
        }
        if($data['mesinicio'] == "Mayo"){
            $data['mesinicio'] = 5;
        }
        if($data['mesinicio'] == "Junio"){
            $data['mesinicio'] = 6;
        }
        if($data['mesinicio'] == "Julio"){
            $data['mesinicio'] = 7;
        }
        if($data['mesinicio'] == "Agosto"){
            $data['mesinicio'] = 8;
        }
        if($data['mesinicio'] == "Septiembre"){
            $data['mesinicio'] = 9;
        }
        if($data['mesinicio'] == "Octubre"){
            $data['mesinicio'] = 10;
        }
        if($data['mesinicio'] == "Noviembre"){
            $data['mesinicio'] = 11;
        }
        if($data['mesinicio'] == "Diciembre"){
            $data['mesinicio'] = 12;
        }

        if($data['mesoferta'] == "Enero"){
            $data['mesoferta'] = 1;
        }
        if($data['mesoferta'] == "Febrero"){
            $data['mesoferta'] = 2;
        }
        if($data['mesoferta'] == "Marzo"){
            $data['mesoferta'] = 3;
        }
        if($data['mesoferta'] == "Abríl"){
            $data['mesoferta'] = 4;
        }
        if($data['mesoferta'] == "Mayo"){
            $data['mesoferta'] = 5;
        }
        if($data['mesoferta'] == "Junio"){
            $data['mesoferta'] = 6;
        }
        if($data['mesoferta'] == "Julio"){
            $data['mesoferta'] = 7;
        }
        if($data['mesoferta'] == "Agosto"){
            $data['mesoferta'] = 8;
        }
        if($data['mesoferta'] == "Septiembre"){
            $data['mesoferta'] = 9;
        }
        if($data['mesoferta'] == "Octubre"){
            $data['mesoferta'] = 10;
        }
        if($data['mesoferta'] == "Noviembre"){
            $data['mesoferta'] = 11;
        }
        if($data['mesoferta'] == "Diciembre"){
            $data['mesoferta'] = 12;
        }
        if($data['vigenciafutura'] == "Si"){
            $data['vigenciafutura'] = true;
        }
        if($data['vigenciafutura'] == "No"){
            $data['vigenciafutura'] = false;
        }

        $adquisicion = Adquisicion::create($data);
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
        if($data['mesinicio'] == "Enero"){
            $data['mesinicio'] = 1;
        }
        if($data['mesinicio'] == "Febrero"){
            $data['mesinicio'] = 2;
        }
        if($data['mesinicio'] == "Marzo"){
            $data['mesinicio'] = 3;
        }
        if($data['mesinicio'] == "Abríl"){
            $data['mesinicio'] = 4;
        }
        if($data['mesinicio'] == "Mayo"){
            $data['mesinicio'] = 5;
        }
        if($data['mesinicio'] == "Junio"){
            $data['mesinicio'] = 6;
        }
        if($data['mesinicio'] == "Julio"){
            $data['mesinicio'] = 7;
        }
        if($data['mesinicio'] == "Agosto"){
            $data['mesinicio'] = 8;
        }
        if($data['mesinicio'] == "Septiembre"){
            $data['mesinicio'] = 9;
        }
        if($data['mesinicio'] == "Octubre"){
            $data['mesinicio'] = 10;
        }
        if($data['mesinicio'] == "Noviembre"){
            $data['mesinicio'] = 11;
        }
        if($data['mesinicio'] == "Diciembre"){
            $data['mesinicio'] = 12;
        }

        if($data['mesoferta'] == "Enero"){
            $data['mesoferta'] = 1;
        }
        if($data['mesoferta'] == "Febrero"){
            $data['mesoferta'] = 2;
        }
        if($data['mesoferta'] == "Marzo"){
            $data['mesoferta'] = 3;
        }
        if($data['mesoferta'] == "Abríl"){
            $data['mesoferta'] = 4;
        }
        if($data['mesoferta'] == "Mayo"){
            $data['mesoferta'] = 5;
        }
        if($data['mesoferta'] == "Junio"){
            $data['mesoferta'] = 6;
        }
        if($data['mesoferta'] == "Julio"){
            $data['mesoferta'] = 7;
        }
        if($data['mesoferta'] == "Agosto"){
            $data['mesoferta'] = 8;
        }
        if($data['mesoferta'] == "Septiembre"){
            $data['mesoferta'] = 9;
        }
        if($data['mesoferta'] == "Octubre"){
            $data['mesoferta'] = 10;
        }
        if($data['mesoferta'] == "Noviembre"){
            $data['mesoferta'] = 11;
        }
        if($data['mesoferta'] == "Diciembre"){
            $data['mesoferta'] = 12;
        }
        
        if($data['vigenciafutura'] == "Si"){
            $data['vigenciafutura'] = true;
        }
        if($data['vigenciafutura'] == "No"){
            $data['vigenciafutura'] = false;
        }
        $adquisicione->update($data);

        return response(['message'=>'Plan de adquisision actualizado', 'adquisision'=>new AdquisicionResource($adquisicione)]);
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
