<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('guide_downloads', function (Blueprint $t) {
            $t->id();

            // Datos del solicitante
            $t->char('ruc', 11)->index();
            $t->string('company', 180);
            $t->string('email', 150)->index();

            // Token para link firmado/descarga
            $t->uuid('token')->unique();

            // Control de descarga
            $t->timestamp('downloaded_at')->nullable();

            // Consentimiento y versiones de política/guía
            $t->boolean('consent')->default(false);
            $t->string('privacy_version', 20)->nullable();
            $t->string('guide_version', 20)->nullable();

            // Trazabilidad
            $t->string('ip', 45)->nullable();
            $t->text('user_agent')->nullable();
            $t->json('utm')->nullable(); // utm_source/medium/campaign

            $t->timestamps();

            // Índices útiles para reporting
            $t->index(['created_at']);
            $t->index(['downloaded_at']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('guide_downloads');
    }
};
