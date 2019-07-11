<?php

namespace App\Http\Controllers\AdminApi;

use App\Models\VsaadtipoDocumento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TipoDocumentoResource;



class TipodocumentosController extends Controller
{
  public function index()
  {
      return TipoDocumentoResource::collection(VsaadtipoDocumento::all());
  }
}
