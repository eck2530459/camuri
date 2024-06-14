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
        Schema::create('contratista_empleados', function (Blueprint $table) {
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

            $table->longText('qr_code');




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratista_empleados');
    }
};
