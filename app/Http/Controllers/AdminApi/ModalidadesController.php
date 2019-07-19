<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use App\Models\Modalidad;
use App\Http\Resources\ModalidadesResource;

class ModalidadesController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modadlidades = Modalidad::all();
        return ModalidadesResource::collection($modadlidades);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Modalidad $modalidad)
    {
        return response()->json(['data'=>$modalidad], 200);
        
    }
}
