<?php

namespace App\Http\Controllers\AdminApi;

use App\Models\VsaadFrentes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FrentesResource;



class FrentesController extends Controller
{
  public function index()
  {
      return FrentesResource::collection(VsaadFrentes::all());
  }
  public function listar_frentes($bloque_id)
    {
        // return VsaadMunicipios::where('departamento_id',$department_id)->get(['id','nombre','departamento_id']);
        return FrentesResource::collection(VsaadFrentes::where('bloque_id',$bloque_id)->get(['id','nombre','bloque_id']));
    }
}
