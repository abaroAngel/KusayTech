<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Nota: evitamos "after('updated_at')" por compatibilidad con SQLite
        if (!Schema::hasColumn('banners', 'deleted_at')) {
            Schema::table('banners', function (Blueprint $t) { $t->softDeletes(); });
        }
        if (!Schema::hasColumn('value_props', 'deleted_at')) {
            Schema::table('value_props', function (Blueprint $t) { $t->softDeletes(); });
        }
        if (!Schema::hasColumn('pillars', 'deleted_at')) {
            Schema::table('pillars', function (Blueprint $t) { $t->softDeletes(); });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('banners', 'deleted_at')) {
            Schema::table('banners', function (Blueprint $t) { $t->dropSoftDeletes(); });
        }
        if (Schema::hasColumn('value_props', 'deleted_at')) {
            Schema::table('value_props', function (Blueprint $t) { $t->dropSoftDeletes(); });
        }
        if (Schema::hasColumn('pillars', 'deleted_at')) {
            Schema::table('pillars', function (Blueprint $t) { $t->dropSoftDeletes(); });
        }
    }
};
