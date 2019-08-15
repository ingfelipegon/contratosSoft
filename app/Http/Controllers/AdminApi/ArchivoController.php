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
        return response($files);
    }

    public function show(Archivo $archivo)
    {
        // $dl = Archivo::find($archivo)->first();
        
        // $rutaDeArchivo = storage_path()."/"."app"."/"."public"."/"."repositorio_documentos"."/".$dl->ruta;
        // $file = Storage::disk('app/public/repositorio_documentos')->get($dl->nombre);
        return response()->download('Informacion⁩/Documentos⁩/FABRICA⁩/plantilla_proyecto_laravel_vuejs⁩/storage/app/public/repositorio_documentos/'.$archivo->ruta."/".$archivo->nombre);
        // return response()->download($file);

        // return response()->download(storage_path("app/public/{$dl->nombre}"));

        // $ruta = $dl->ruta;
        // return Storage::download($rutaDeArchivo, $dl->nombre);  
        // return Storage::download($dl->ruta, $dl->title);              
    }


}
