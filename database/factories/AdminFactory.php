<?php

namespace Database\Factories;


use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class AdminFactory extends Factory
{
   

    protected static ?string $password;

   
    public function definition(): array
    {
        return [
            'alias' => $this->faker->userName(),
          'password' => bcrypt('password'),
            'fecha_creacion' => now(), 
        ];
    }

  
   
}