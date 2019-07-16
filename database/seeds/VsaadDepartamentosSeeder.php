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

      ///////////////////////////////////////////
      VsaadDepartamentos::create([
        'codigo'    => '1',
        'nombre'    => 'CORDOBA',
        'map_code'    => '10',
        'estado'    => 1,
      ]);

      VsaadDepartamentos::create([
        'codigo'    => '12',
        'nombre'    => 'CUNDINAMARCA',
        'map_code'    => '20',
        'estado'    => 1,
      ]);

      ///////////////////////////////////////////


      // $uploadDataController=new UploadDataController();

      // // Log::info('Start Seeder');

      // // Log::info('Cargando departamentos...');
      // $uploadDataController->uploadVdepartamentos('departamentos.csv');
      // // Log::info('departamentos cargados');

       DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
