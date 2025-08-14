<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('leads', function (Blueprint $t) {
            $t->id();

            // Datos básicos
            $t->string('full_name', 120);
            $t->char('ruc', 11)->index();               // RUC Perú
            $t->string('company', 180);
            $t->string('role', 80)->nullable();

            // Contacto
            $t->string('phone', 20)->nullable();
            $t->string('email', 150)->index();

            // Interés (categorías del sitio)
            $t->enum('interest', ['ERP','Software','Marketing','Tienda','Soporte'])
              ->index();

            // Mensaje
            $t->text('message');

            // Estado del lead (pipeline simple)
            $t->enum('status', ['new','in_progress','closed'])->default('new')->index();

            // Origen y metadatos
            $t->string('source', 60)->nullable();        // ej: web, landing, ads
            $t->json('meta')->nullable();                // utm, referrer, etc.

            // Consentimiento y auditoría
            $t->boolean('consent')->default(false);
            $t->timestamp('consent_at')->nullable();

            // Asignación interna (opcional)
            $t->foreignId('assigned_to')->nullable()->constrained('users')
              ->nullOnDelete();

            $t->timestamps();
            $t->softDeletes();

            // Índice compuesto útil para reporting
            $t->index(['interest','created_at']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('leads');
    }
};
