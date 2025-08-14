<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('guide_downloads', function (Blueprint $t) {
            $t->index(['ruc','email','created_at'], 'idx_guide_ruc_email_date');
        });
    }
    public function down(): void {
        Schema::table('guide_downloads', function (Blueprint $t) {
            $t->dropIndex('idx_guide_ruc_email_date');
        });
    }
};
