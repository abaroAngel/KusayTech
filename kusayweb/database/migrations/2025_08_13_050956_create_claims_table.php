<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('claims', function (Blueprint $t) {
            $t->id();

            $t->string('code', 30)->unique();  // Código de caso público
            $t->enum('type', ['reclamo','queja'])->index();

            // Datos del consumidor y del bien/servicio
            $t->json('consumer_json');         // nombres, doc, teléfono, email, dirección
            $t->json('product_json');          // producto/servicio, monto, fecha, etc.

            // Contenido
            $t->text('detail');                // descripción del reclamo/queja
            $t->text('request_text');          // pedido del consumidor

            // Flujo
            $t->enum('status', ['recibido','en_revision','respondido','cerrado'])
              ->default('recibido')->index();
            $t->timestamp('notified_at')->nullable();
            $t->timestamp('responded_at')->nullable();
            $t->json('response_json')->nullable(); // respuesta enviada

            $t->timestamps();
            $t->softDeletes();

            $t->index(['created_at']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('claims');
    }
};
