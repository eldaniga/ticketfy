<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    const CREATED_AT = 'fecha';
    const UPDATED_AT = null;


    use HasFactory;

    protected $fillable = ['titulo', 'descripcion', 'estado', 'fecha'];
}