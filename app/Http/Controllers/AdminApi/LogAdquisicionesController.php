<?php

namespace App\Http\Controllers\AdminApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Adquisicion;
use App\Http\Resources\AdquisicionResource;
use App\Models\LogAdquisicion;
use Illuminate\Support\Facades\Log;

class LogAdquisicionesController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Adquisicion $adquisicione)
    {
        $logAdquisiciones = $adquisicione->logAdquisiciones;             
        return LogAdquisicionResource::collection($logAdquisiciones);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(LogAdquisicion $adquisicione)
    {
        return response(['data'=>new AdquisicionResource($adquisicione)]);
    }


}
