<?php

namespace App\Http\Controllers\AdminApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\LogSolicitudResource;
use App\Http\Resources\SolicitudeResource;
use App\Models\Solicitud;

class SolicitudLogSolicitudesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Solicitud $solicitude)
    {
        $logSolicitudes = $solicitude->logSolicitudes;             
        return LogSolicitudResource::collection($logSolicitudes);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitud $solicitude)
    {
        return response(['data'=>new SolicitudeResource($solicitude)]);
    }
}
