<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('order_items', function (Blueprint $t) {
            $t->unique(['order_id','product_id'], 'uq_order_items_order_product');
        });
    }
    public function down(): void {
        Schema::table('order_items', function (Blueprint $t) {
            $t->dropUnique('uq_order_items_order_product');
        });
    }
};
