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
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->string('modelo');
            $table->string('descripcion');
            $table->string('serial');
            //$table->string('marca_id');
            //$table->string('hw_id');
            
            $table->foreignId('marca_id')
            ->nullable()
            ->references('id')->on('marcahws')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            
            $table->foreignId('hw_id')
            ->nullable()
            ->references('id')->on('hardware')
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
        Schema::dropIfExists('inventarios');
    }
};
