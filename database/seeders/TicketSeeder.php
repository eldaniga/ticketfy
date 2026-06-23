<?php

namespace Database\Seeders;


use App\Models\Ticket;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    public function run(): void
    {
     
        \App\Models\Ticket::factory(30)->create();
    }
}