<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('vouchers', function (Blueprint $t) {
            $t->unique(['ruc_emisor','tipo','serie','numero'], 'uq_voucher_doc');
        });
    }
    public function down(): void {
        Schema::table('vouchers', function (Blueprint $t) {
            $t->dropUnique('uq_voucher_doc');
        });
    }
};
