<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('orders', function (Blueprint $t) {
            $t->id();
            $t->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();

            $t->string('code', 20)->unique();
            $t->enum('status', ['pending','paid','failed','cancelled','shipped','completed'])
              ->default('pending')->index();

            $t->json('customer_json');           // name, email, phone
            $t->json('billing_json');            // ruc, company, address
            $t->json('shipping_json')->nullable();

            $t->decimal('subtotal', 12, 2)->default(0);
            $t->decimal('discount_total', 12, 2)->default(0);
            $t->decimal('tax_total', 12, 2)->default(0);
            $t->decimal('total', 12, 2)->default(0);
            $t->string('currency', 3)->default('PEN');

            $t->text('notes')->nullable();

            $t->timestamps();

            $t->index(['status','created_at']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('orders');
    }
};
