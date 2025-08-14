<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void {
        // Leads.ruc
        DB::statement("ALTER TABLE leads
            ADD CONSTRAINT chk_leads_ruc CHECK (ruc REGEXP '^[0-9]{11}$')");

        // Guide.ruc
        DB::statement("ALTER TABLE guide_downloads
            ADD CONSTRAINT chk_guide_ruc CHECK (ruc REGEXP '^[0-9]{11}$')");

        // Vouchers: ruc_emisor y ruc_cliente y total >= 0
        DB::statement("ALTER TABLE vouchers
            ADD CONSTRAINT chk_vouchers_ruc_emisor CHECK (ruc_emisor REGEXP '^[0-9]{11}$'),
            ADD CONSTRAINT chk_vouchers_ruc_cliente CHECK (ruc_cliente IS NULL OR ruc_cliente REGEXP '^[0-9]{11}$'),
            ADD CONSTRAINT chk_vouchers_total CHECK (total >= 0)");

        // Cart & Order items: qty>0 y montos >= 0
        DB::statement("ALTER TABLE cart_items
            ADD CONSTRAINT chk_cart_items_qty CHECK (qty > 0),
            ADD CONSTRAINT chk_cart_items_unit_price CHECK (unit_price >= 0),
            ADD CONSTRAINT chk_cart_items_total CHECK (total >= 0)");

        DB::statement("ALTER TABLE order_items
            ADD CONSTRAINT chk_order_items_qty CHECK (qty > 0),
            ADD CONSTRAINT chk_order_items_unit_price CHECK (unit_price >= 0),
            ADD CONSTRAINT chk_order_items_total CHECK (total >= 0)");
    }

    public function down(): void {
        // MySQL no soporta nombre automático; hay que soltar por nombre exacto.
        DB::statement("ALTER TABLE leads DROP CHECK chk_leads_ruc");
        DB::statement("ALTER TABLE guide_downloads DROP CHECK chk_guide_ruc");
        DB::statement("ALTER TABLE vouchers DROP CHECK chk_vouchers_ruc_emisor");
        DB::statement("ALTER TABLE vouchers DROP CHECK chk_vouchers_ruc_cliente");
        DB::statement("ALTER TABLE vouchers DROP CHECK chk_vouchers_total");
        DB::statement("ALTER TABLE cart_items DROP CHECK chk_cart_items_qty");
        DB::statement("ALTER TABLE cart_items DROP CHECK chk_cart_items_unit_price");
        DB::statement("ALTER TABLE cart_items DROP CHECK chk_cart_items_total");
        DB::statement("ALTER TABLE order_items DROP CHECK chk_order_items_qty");
        DB::statement("ALTER TABLE order_items DROP CHECK chk_order_items_unit_price");
        DB::statement("ALTER TABLE order_items DROP CHECK chk_order_items_total");
    }
};
