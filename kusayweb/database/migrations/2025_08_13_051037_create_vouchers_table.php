<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('vouchers', function (Blueprint $t) {
            $t->id();

            // Identificación del emisor y del comprobante
            $t->char('ruc_emisor', 11)->index();
            $t->string('tipo', 2);                 // 01=Factura, 03=Boleta, etc.
            $t->string('serie', 6);
            $t->string('numero', 10);

            // Cliente
            $t->char('ruc_cliente', 11)->nullable()->index();
            $t->string('razon_social', 200)->nullable();

            // Datos contables
            $t->date('fecha_emision')->index();
            $t->decimal('total', 12, 2);

            // Archivos
            $t->string('pdf_path')->nullable();
            $t->string('xml_path')->nullable();
            $t->string('hash')->nullable();

            // Estado
            $t->enum('status', ['emitido','anulado'])->default('emitido')->index();

            // Extra
            $t->json('extra_json')->nullable();

            $t->timestamps();

            // Índices compuestos para búsqueda rápida
            $t->index(['ruc_emisor','tipo','serie','numero'], 'idx_voucher_emisor_doc');
            $t->index(['ruc_cliente','serie','numero'], 'idx_voucher_cliente_doc');
        });
    }
    public function down(): void {
        Schema::dropIfExists('vouchers');
    }
};
