<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('office_hours', function (Blueprint $t) {
            $t->unique(['office_id','day_of_week','start_time','end_time'], 'uq_office_hours_slot');
        });
    }
    public function down(): void {
        Schema::table('office_hours', function (Blueprint $t) {
            $t->dropUnique('uq_office_hours_slot');
        });
    }
};
