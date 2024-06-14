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
        Schema::create('hardware_usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('status');

            $table->foreignId('user_id')
            ->nullable()
            ->references('id')->on('users')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            
            $table->foreignId('hw_descripcion_id')
            ->nullable()
            ->references('id')->on('inventarios')
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
        Schema::dropIfExists('hardware_usuarios');
    }
};
