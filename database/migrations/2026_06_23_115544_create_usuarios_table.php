<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    protected $table = 'usuarios';
    public $timestamps = true;
    const CREATED_AT = "fecha_creacion";
    const UPDATED_AT = null;
    
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string("alias");
            $table->string("password");
            $table->timestamp("fecha_creacion");

        });
    }
   
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
