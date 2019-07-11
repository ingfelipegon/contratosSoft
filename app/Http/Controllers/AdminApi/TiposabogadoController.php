<?php

namespace App\Http\Controllers\AdminApi;

use App\Models\VsaadtipoAbogado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TipoabogadoResource;



class TiposabogadoController extends Controller
{
  public function index()
  {
      return TipoabogadoResource::collection(VsaadtipoAbogado::all());
  }
}
