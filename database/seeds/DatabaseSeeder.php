<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        $this->truncateTables([
            'areas',
            'estados_operacion',
            'estados_proceso',
            'etapas',
            'fuentes',
            'tipos_identificacion',
            'modalidades',
            'tipos_tramite',
            'unidades',
            'etapas_modalidad',
        ]);
        $this->call([
                AreaTableSeeder::class,
                EstadosOperacionTableSeeder::class,
                EstadosProcesoTableSeeder::class,
                EstadosCustodiaTableSeeder::class,
                EtapaTableSeeder::class,
                FuenteTableSeeder::class,
                IdentificacionTableSeeder::class,
                ModalidadTableSeeder::class,
                TramiteTableSeeder::class,
                UnidadTableSeeder::class,
                EtapasModalidadTableSeeder::class,
            ]);

    }

    protected function truncateTables(array $tablas)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        foreach ($tablas as $tabla) {
            DB::table($tabla)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');   
    }

}
