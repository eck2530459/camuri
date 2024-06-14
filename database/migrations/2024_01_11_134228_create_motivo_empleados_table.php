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
        Schema::create('motivo_empleados', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('emp_id')
            ->nullable()
            ->references('id')->on('empleados')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            
            $table->foreignId('motivo_id')
            ->nullable()
            ->references('id')->on('motivo_entradas')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->timestamps();
            
            $table->string('f_vencimiento');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motivo_empleados');
    }
};
