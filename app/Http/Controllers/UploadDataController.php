<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VsaadMunicipios;
use App\Models\VsaadDepartamentos;
use App\Models\VsaadBloque;
use App\Models\VsaadFrentes;
use Log;

class UploadDataController extends Controller
{
    protected $sources_path;

      public function __construct()
    {
        $this->sources_path=storage_path()."/app/sources/";

    }



public function uploadVmunicipios($sourcename){
     if (($handle = fopen ( $this->sources_path. $sourcename, 'r' )) !== FALSE) {
        $i=1;
        while ( ($data = fgetcsv ( $handle, 9900, ',' )) !== FALSE ) {
            // Log::info('linea: '.$i);
            $departamento = VsaadDepartamentos::where('codigo',intval($data[0]))->first();
            $municipality = new VsaadMunicipios();
            $municipality->codigo = $data[2];
            $municipality->nombre = $data[3];
            $municipality->departamento_id = $departamento->id;
            // $municipality->tipo = $data[3];
            // $municipality->estado = $data[4];
            $municipality->save ();
            $i++;
        }
        fclose ( $handle );
     }

}

public function uploadVfrentes($sourcename){
     if (($handle = fopen ( $this->sources_path. $sourcename, 'r' )) !== FALSE) {
        $i=1;
        while ( ($data = fgetcsv ( $handle, 9900, ',' )) !== FALSE ) {

            $bloque = VsaadBloque::where('codigo',intval($data[1]))->first();
            $frentes = new VsaadFrentes();
            $frentes->codigo = $data[2];
            $frentes->nombre = $data[0];
            $frentes->bloque_id = $bloque->id;
            // $frentes->tipo = $data[3];
            // $frentes->estado = $data[4];
            $frentes->save ();
            $i++;
        }
        fclose ( $handle );
     }

}



public function uploadVdepartamentos($sourcename){
    if (($handle = fopen ( $this->sources_path. $sourcename, 'r' )) !== FALSE) {
        $i=1;
        while ( ($data = fgetcsv ( $handle, 5000, ',' )) !== FALSE ) {
            Log::info('linea: '.$i);
            $department = new VsaadDepartamentos();
            $department->codigo = $data[0];
            $department->nombre = $data[1];
            $department->map_code = $data[2];
            // $department->estado = $data[3];
            $department->save ();
            $i++;
        }
        fclose ( $handle );
     }
 }



}
