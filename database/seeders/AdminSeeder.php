<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
      public function run(): void
    {

    \App\Models\Admin::factory()->create([
    'alias' => 'admin',
    'password' => bcrypt('admin1234'), // alias: admin / password: admin
    ]);

        \App\Models\Admin::factory(5)->create();
    }
}
