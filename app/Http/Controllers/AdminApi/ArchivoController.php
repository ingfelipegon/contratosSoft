<?php

namespace App\Http\Controllers\AdminApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArchivoResource;
use App\Models\Solicitud;
use Illuminate\Support\Facades\Storage;
use App\Models\Archivo;
use Illuminate\Support\Facades\Log;

class ArchivoController extends Controller
{
    private $storage_documentos;

    public function __construct()
    {
      //$this->middleware('auth');
      $this->storage_documentos=Storage::disk('repositorio_documentos');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $archivos = Archivo::all();    
        return ArchivoResource::collection($archivos);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showFiles($file)
    {
        foreach ($this->storage_documentos->files($file) as $filename) {
            Log::info($filename);            
            $files[] = $filename;
        }
        // return Storage::download($files[0]);        
        $archivos = Archivo::where('ruta', $file)->get();        
        return ArchivoResource::collection($archivos); 
    }

    public function show($id, $nombre)
    {        
        $dl = Archivo::find($id);        
        return response()->download(storage_path("app/public/repositorio_documentos/{$nombre}/{$dl->nombre}"));
    }

    public function showBiblioteca($nombre)
    {        
        return response()->download(storage_path("app/public/repositorio_documentos/biblioteca/{$nombre}"));
    }


}
