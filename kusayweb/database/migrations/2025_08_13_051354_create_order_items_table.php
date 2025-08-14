<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('order_items', function (Blueprint $t) {
            $t->id();
            $t->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $t->foreignId('product_id')->nullable()->constrained('products')->nullOnDelete();

            $t->string('name');
            $t->string('sku');
            $t->unsignedInteger('qty');
            $t->decimal('unit_price', 12, 2);
            $t->decimal('total', 12, 2);

            $t->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('order_items');
    }
};
