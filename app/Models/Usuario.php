<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;

    // 1. Indicarle a Eloquent el nombre personalizado de la columna de creación
    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = null; 

    public $timestamps = true;

    protected $fillable = [
        'alias',
        'password',
        'fecha_creacion',
    ];
}
