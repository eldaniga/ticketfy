<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\TicketManager;
use App\Livewire\Login;



//lo dejo xq si
Route::get('/', Login::class);
Route::post('/', Login::class);


Route::get('/dashboard', TicketManager::class)->name('dashboard');
