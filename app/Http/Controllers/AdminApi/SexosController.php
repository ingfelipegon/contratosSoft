<?php

namespace App\Http\Controllers\AdminApi;

use App\Models\VsaadSexo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SexoResource;



class SexosController extends Controller
{
  public function index()
  {
      return SexoResource::collection(VsaadSexo::all());
  }
}
