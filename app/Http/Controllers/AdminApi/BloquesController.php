<?php

namespace App\Http\Controllers\AdminApi;

use App\Models\VsaadBloque;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BloquesResource;



class BloquesController extends Controller
{
  public function index()
  {
      return BloquesResource::collection(VsaadBloque::all());
  }
}
