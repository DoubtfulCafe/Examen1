<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('directorio', function (Blueprint $table) {
           
            $table->string('codigoEntrada')->primaryKey();
            $table->string('nombre',25);
            $table->string('apellido',25);
            $table->string('correo',100)->unique();
            $table->string('telefono',25);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('directorio');
    }
};
