<?php

use Illuminate\Database\Seeder;
use App\Http\Controllers\UploadDataController;
use App\Models\VsaadFrentes;

class VsaadFrentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


       DB::statement('SET FOREIGN_KEY_CHECKS=0');
       VsaadFrentes::truncate();


    ///////////////////////////////////////////
    VsaadFrentes::create([
        'nombre'    => 'FRENTE 54 CORDOBA',
        'bloque_id'    => 1,
        'codigo'    => '10',
        'estado'    => 1,
      ]);

      VsaadFrentes::create([        
        'nombre'    => 'FRENTE 19 CUNDINAMRACA',
        'bloque_id'    => 2,
        'codigo'    => '20',
        'estado'    => 1,
      ]);

      ///////////////////////////////////////////


	// 	$uploadDataController=new UploadDataController();

    //   	// Log::info('Start Seeder');

    //    //  Log::info('Cargando Municipios...');
    //     $uploadDataController->uploadVfrentes('frentes.csv');
    //     // Log::info('Municipios cargados');

         DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
