<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('historial_focos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('foco_id')->constrained()->onDelete('cascade');
            $table->boolean('estado');
            $table->timestamp('fecha');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('historial_focos');
    }
};
