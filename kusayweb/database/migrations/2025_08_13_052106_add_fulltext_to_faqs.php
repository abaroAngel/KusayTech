<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('faqs', function (Blueprint $t) {
            $t->fullText(['question','answer'], 'ft_faqs');
        });
    }
    public function down(): void {
        Schema::table('faqs', function (Blueprint $t) {
            $t->dropFullText('ft_faqs');
        });
    }
};
