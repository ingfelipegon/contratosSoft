<?php

use Illuminate\Database\Seeder;
use App\Http\Controllers\UploadDataController;
use App\Models\VsaadMunicipios;

class VsaadMunicipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


       DB::statement('SET FOREIGN_KEY_CHECKS=0');
       VsaadMunicipios::truncate();


		$uploadDataController=new UploadDataController();

      	// Log::info('Start Seeder');

       //  Log::info('Cargando Municipios...');
        $uploadDataController->uploadVmunicipios('municipios.csv');
        // Log::info('Municipios cargados');

         DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
