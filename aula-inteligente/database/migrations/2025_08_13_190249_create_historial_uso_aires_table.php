<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('historial_uso_aire', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aire_acondicionado_id')->constrained()->onDelete('cascade');
            $table->boolean('estado');
            $table->integer('temperatura')->nullable();
            $table->timestamp('fecha');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('historial_uso_aire');
    }
};
