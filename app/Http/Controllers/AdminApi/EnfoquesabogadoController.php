<?php

namespace App\Http\Controllers\AdminApi;

use App\Models\VsaadenfoqueAbogado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EnfoqueabogadoResource;



class EnfoquesabogadoController extends Controller
{
  public function index()
  {
      return EnfoqueabogadoResource::collection(VsaadenfoqueAbogado::all());
  }
}
