<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(4),
            'descripcion' => $this->faker->paragraph(3),
            'estado' => $this->faker->randomElement(['abierto', 'en_proceso', 'cerrado']),
            'fecha' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}