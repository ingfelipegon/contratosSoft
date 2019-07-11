<?php

namespace App\Http\Controllers\AdminApi;

use App\Models\VsaadDepartamentos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DepartamentosResource;



class DepartamentosController extends Controller
{
  public function index()
  {
      return DepartamentosResource::collection(VsaadDepartamentos::all());
  }
}
