<?php

namespace App\Http\Controllers\AdminApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CustodiaResource;
use App\Models\Custodia;

class CustodiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Custodia $custodia)
    {
        $custodias = Custodia::all();
        return CustodiaResource::collection($custodias);
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
            'estadocustodia_id' => 'required|integer|min:1',
            'respopnsable_id' => 'required|integer|min:1',
        ];

        $this->validate($request, $rules);
        $data = $request->all();

        $custodia = Custodia::create($data);
        return response(['message'=>'La custodia ha sido creada correctamente', 'custodia'=>new CustodiaResource($custodia)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Custodia $custodia)
    {
        $rules = [            				
            'descripcion' => 'required',	
            'estadocustodia_id' => 'required|integer|min:1',
            'respopnsable_id' => 'required|integer|min:1',
        ];

        $this->validate($request, $rules);
        $data = $request->all();
        $custodia->update($data);

        return response(['message'=>'Solicitud de contratación ha sido actualizado correctamente', 'custodia'=>new CustodiaResource($custodia)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Custodia $custodia)
    {
        $custodia->delete();
        return response(['message'=>'El Item de la custodia seleccionada ha eliminado correctamente', 'custodia'=>new CustodiaResource($custodia)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Custodia $custodia)
    {
        return new CustodiaResource($custodia);
    }
}
