<?php

namespace App\Http\Controllers\AdminApi;

use App\Models\VsaadidentidadGenero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\GeneroResource;



class GenerosController extends Controller
{
  public function index()
  {
      return GeneroResource::collection(VsaadidentidadGenero::all());
  }
}
