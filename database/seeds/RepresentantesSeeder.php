<?php

use App\Models\Representante;
use Illuminate\Database\Seeder;

class RepresentantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=Representante::create([
            'name'=>"Jhony",
            'numeroDocumento'=>"80179878",
             'email'=>"jhonyrocha@gmail.com",
             'password'=>bcrypt("123456")
            ]);
    
        $user=Representante::create([
            'name'=>"Orlando",
            'numeroDocumento'=>"80123867",
            'email'=>"orlandoperez@gmail.com",
            'password'=>bcrypt("123456")
            ]);
    }
}
