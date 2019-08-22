<?php
namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\VsaadAbogado;

class FileController extends Controller
{
  private $loggedin_user;
  private $storage_documentos;
  private $file_path;

  public function __construct()
  {
    //$this->middleware('auth');
    $this->storage_documentos=Storage::disk('repositorio_documentos');
  }

  public function uploadFile(Request $request){
    try{
      $input = $request->all();
      $documento_id =$input['identificacion'];
      $documento_cual =$input['nombre_adjunto'];
      $id_solicitud =$input['id_solicitud'];
      
      $this->file_path=$documento_id;

      $this->storage_documentos->makeDirectory($this->file_path);
      // Log::info("Entro Creo directorio");
      $file =$input['archivo'];

      $filename=$file->getClientOriginalName();

      if ($this->storage_documentos->exists($this->file_path."/".$filename)) {
        $this->storage_documentos->delete($this->file_path."/".$filename);
      }

      // Log::info("Entro antes guaradr");
      $this->storage_documentos->put($this->file_path."/".$filename, file_get_contents($file->getRealPath()));
      Log::info("Entro despues guaradr");
      DB::beginTransaction();
            Archivo::updateOrCreate(
                  ['nombre'=>$documento_cual,
                  'ruta'=>$documento_id,
                  'solicitud_id'=>$id_solicitud
                  ]);
      DB::commit();
      return response(['message'=>'Archivo cargado', 'archivo'=>$this->file_path."/".$filename]);

    }

    catch (\Exception $e){
      //DB::rollback();
      // Log::info('Entro a error');
      Log::error($e->getMessage());
    }    
  }
}
