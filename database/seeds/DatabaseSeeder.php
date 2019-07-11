<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(VsaadDependenciasSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(VsaadTiposDcumentosSeeder::class);
        $this->call(VsaadTiposAbogadosSeeder::class);
        $this->call(VsaadPertenenciasEtniasSeeder::class);
        $this->call(VsaadIdentidadesGenerosSeeder::class);
        $this->call(VsaadSexosSeeder::class);
        $this->call(VsaadEnfoquesAbogadosSeeder::class);
        $this->call(VsaadDepartamentosSeeder::class);
        $this->call(VsaadBloquesSeeder::class);
        $this->call(VsaadMunicipiosSeeder::class);
        $this->call(VsaadFrentesSeeder::class);
    }
}
