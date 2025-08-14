<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('payments', function (Blueprint $t) {
            $t->id();
            $t->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $t->enum('provider', ['Culqi','MercadoPago','Stripe','Otro']);
            $t->string('provider_ref')->index();
            $t->decimal('amount', 12, 2);
            $t->string('currency', 3)->default('PEN');
            $t->enum('status', ['pending','paid','failed','refunded'])->default('pending')->index();
            $t->json('payload')->nullable();
            $t->timestamp('paid_at')->nullable();
            $t->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('payments');
    }
};
