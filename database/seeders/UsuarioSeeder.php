<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;



class UsuarioSeeder extends Seeder
{
      public function run(): void
    {

        \App\Models\Usuario::factory()->create([
            'alias' => 'user',
            'password' => bcrypt('user1234'), 
        'fecha_creacion'=> now(), // alias: admin / password: admin
    ]);

        \App\Models\Usuario::factory(5)->create();
    }
}
