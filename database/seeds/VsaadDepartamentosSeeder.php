<?php

use Illuminate\Database\Seeder;
use App\Http\Controllers\UploadDataController;
use App\Models\VsaadDepartamentos;

class VsaadDepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        VsaadDepartamentos::truncate();


        $uploadDataController=new UploadDataController();

      	// Log::info('Start Seeder');

        // Log::info('Cargando departamentos...');
        $uploadDataController->uploadVdepartamentos('departamentos.csv');
        // Log::info('departamentos cargados');

         DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
