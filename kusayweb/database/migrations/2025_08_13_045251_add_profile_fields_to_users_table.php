<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::table('users', function (Blueprint $t) {
            $t->string('phone', 20)->nullable()->after('email');
            $t->string('role_hint', 50)->nullable()->after('phone');
            $t->boolean('is_active')->default(true)->after('remember_token');
            $t->timestamp('last_login_at')->nullable()->after('email_verified_at');
            $t->softDeletes();
        });
    }

    public function down(): void {
        Schema::table('users', function (Blueprint $t) {
            $t->dropColumn(['phone','role_hint','is_active','last_login_at','deleted_at']);
        });
    }

};
