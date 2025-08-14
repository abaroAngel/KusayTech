<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('payments', function (Blueprint $t) {
            $t->unique(['provider','provider_ref'], 'uq_payments_provider_ref');
        });
    }
    public function down(): void {
        Schema::table('payments', function (Blueprint $t) {
            $t->dropUnique('uq_payments_provider_ref');
        });
    }
};
