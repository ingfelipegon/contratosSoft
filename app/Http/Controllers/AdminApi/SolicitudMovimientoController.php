<?php

namespace App\Http\Controllers\AdminApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MovimientoResource;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\Solicitud;

class SolicitudMovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Solicitud $solicitude)
    {
        $movimientos = $solicitude->movimientos;        
        return MovimientoResource::collection($movimientos);
    }
}
