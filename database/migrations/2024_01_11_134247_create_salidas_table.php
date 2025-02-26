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
        Schema::create('salidas', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('emp_id')
            ->nullable()
            ->references('id')->on('empleados')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            
            $table->foreignId('cont_id')
            ->nullable()
            ->references('id')->on('contratistas')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->string('fecha');
            $table->string('hora');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salidas');
    }
};
