<?php

namespace App\Http\Controllers\AdminApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MesesResource;
use App\Models\Mes;

class MesesController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesesAno = Mes::all();
        return MesesResource::collection($mesesAno);
    }
}
