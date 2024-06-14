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
        Schema::create('historial_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('razon_estatus')->nullable();
            $table->string('ticket_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('asunto')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('respuesta')->nullable();
            $table->string('imagen')->nullable();
            $table->string('analista_id')->nullable();
            $table->string('mod_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_tickets');
    }
};
