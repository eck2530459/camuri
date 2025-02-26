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
        Schema::create('ticket_detalles', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion')->nullable();
            $table->string('respuesta')->nullable();
            $table->string('imagen')->nullable();
            $table->string('analista_id')->nullable();
           

            $table->foreignId('user_id')
            ->nullable()
            ->references('id')->on('users')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            
            $table->foreignId('ticket_id')
            ->nullable()
            ->references('id')->on('tickets')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->foreignId('asunto_id')
            ->nullable()
            ->references('id')->on('asuntos')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_detalles');
    }
};
