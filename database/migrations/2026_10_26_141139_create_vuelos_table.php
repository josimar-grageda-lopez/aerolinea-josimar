<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vuelos', function (Blueprint $table) {
            $table->id('id_vuelo');
            $table->foreignId('id_aerolinea')
                ->constrained('aerolineas', 'id_aerolinea')
                ->cascadeOnDelete();
            $table->string('origen', 100);
            $table->string('destino', 100);
            $table->date('fecha');
            $table->decimal('precio', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vuelos');
    }
};