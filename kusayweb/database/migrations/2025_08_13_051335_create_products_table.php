<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('products', function (Blueprint $t) {
            $t->id();
            $t->foreignId('brand_id')->nullable()->constrained('brands')->nullOnDelete();
            $t->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();

            $t->string('sku')->unique();
            $t->string('name');
            $t->string('slug')->unique();
            $t->longText('description')->nullable();

            $t->decimal('price', 12, 2)->default(0);
            $t->decimal('compare_price', 12, 2)->nullable();
            $t->integer('stock')->default(0);
            $t->decimal('weight', 10, 3)->nullable();

            $t->json('specs_json')->nullable();
            $t->boolean('is_active')->default(true);

            $t->timestamps();
            $t->softDeletes();

            $t->index(['brand_id','category_id','is_active']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('products');
    }
};
