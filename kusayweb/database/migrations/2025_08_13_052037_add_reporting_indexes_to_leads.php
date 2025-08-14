<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('leads', function (Blueprint $t) {
            $t->index(['assigned_to','status','created_at'], 'idx_leads_assigned_status_date');
            $t->index(['ruc','email'], 'idx_leads_ruc_email');
        });
    }
    public function down(): void {
        Schema::table('leads', function (Blueprint $t) {
            $t->dropIndex('idx_leads_assigned_status_date');
            $t->dropIndex('idx_leads_ruc_email');
        });
    }
};
