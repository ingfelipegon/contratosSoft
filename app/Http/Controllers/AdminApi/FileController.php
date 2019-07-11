<?php
namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
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
      // $tramite=ActuacionTramite::findOrFail($input['tramite_id']);
      // $user=Auth::user();
      // $this->file_path=$tramite->codigo_proceso.'_'.$tramite->id.'/'.Auth::user()->numero_identidad;

      // $this->file_path='test_dir'; //ESTE ESTABA
      $documento_id =$input['identificacion'];
      $documento_cual =$input['nombre_adjunto'];
      $this->file_path=$documento_id;

      $this->storage_documentos->makeDirectory($this->file_path);
      // Log::info("Entro Creo directorio");
      $file =$input['archivo'];

      $filename=$file->getClientOriginalName();

      if ($this->storage_documentos->exists($this->file_path."/".$documento_cual."_".$filename)) {
        $this->storage_documentos->delete($this->file_path."/".$documento_cual."_".$filename);
      }

      // Log::info("Entro antes guaradr");
      $this->storage_documentos->put($this->file_path."/".$documento_cual."_".$filename, file_get_contents($file->getRealPath()));
      // Log::info("Entro despues guaradr");
      //  DB::beginTransaction();
      //         UserProcesoDocumento::updateOrCreate(
      //              ['user_id'=>$user->id,
      //              'proceso_id'=>$proceso->id,
      //              'documento_id'=>$documento->id
      //              ]);
      //         $user->procesos()->sync([$proceso->id]);
      //  DB::commit();
      return response(['message'=>'Archivo cargado', 'archivo'=>$this->file_path."/".$documento_cual."_".$filename]);

    }

    catch (\Exception $e){
      //DB::rollback();
      // Log::info('Entro a error');
      Log::error($e->getMessage());
      // return response()->json(['message'=>"Error at adding new item to order", "order_id"=>$this->order->id],500);
    }
    //return response()->json(['message'=>"item has been added to main order successfully", "order_id"=>$this->order->id,"item_id"=>$order_item->id]);
  }
}
