<?php

namespace App\Http\Controllers\AdminApi;

use App\Models\VsaadMunicipios;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MunicipiosResource;



class MunicipiosController extends Controller
{
  public function index()
  {
      return MunicipiosResource::collection(VsaadMunicipios::all());
  }
  public function listar_municipios($department_id)
    {
        return MunicipiosResource::collection(VsaadMunicipios::where('departamento_id',$department_id)->get(['id','nombre']));
        // return VsaadMunicipios::where('departamento_id',$department_id)->first();
        // return MunicipiosResource::collection(VsaadMunicipios::where('departamento_id',$department_id)->first());
    }
}
