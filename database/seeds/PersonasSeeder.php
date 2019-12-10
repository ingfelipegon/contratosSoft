<?php

use App\Models\Persona;
use Illuminate\Database\Seeder;

class PersonasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=Persona::create([
            'name'=>"Jhon",
            'numeroDocumento'=>"80150682",
             'email'=>"jhonmunevar@gmail.com",
             'password'=>bcrypt("123456")
            ]);
    
        $user=Persona::create([
            'name'=>"Felipe",
            'numeroDocumento'=>"80150682",
            'email'=>"pipesoft2010@gmail.com",
            'password'=>bcrypt("123456")
            ]);
    }
}
