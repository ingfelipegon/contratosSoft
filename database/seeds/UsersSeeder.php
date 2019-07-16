<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
		'name'=>"Jhon",
 		'email'=>"jhonmunevar@gmail.com",
 		'password'=>bcrypt("123456")
        ]);

        $user=User::create([
        'name'=>"Felipe",
        'email'=>"pipesoft2010@gmail.com",
        'password'=>bcrypt("123456")
        ]);
    }
}
