<?php

namespace App\Http\Controllers\AdminApi;

use App\Models\VsaadpertenenciaEtnia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EtniaResource;



class EtniasController extends Controller
{
  public function index()
  {
      return EtniaResource::collection(VsaadpertenenciaEtnia::all());
  }
}
