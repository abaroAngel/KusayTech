<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('cart_items', function (Blueprint $t) {
            $t->id();
            $t->foreignId('cart_id')->constrained('carts')->cascadeOnDelete();
            $t->foreignId('product_id')->constrained('products')->restrictOnDelete();
            $t->unsignedInteger('qty');
            $t->decimal('unit_price', 12, 2);
            $t->decimal('total', 12, 2);
            $t->timestamps();

            $t->unique(['cart_id','product_id']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('cart_items');
    }
};
