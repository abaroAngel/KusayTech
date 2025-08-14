<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('settings', function (Blueprint $t) {
            $t->id();
            $t->string('group', 50)->index();  // ej: site, seo, legal, email
            $t->string('key')->unique();       // ej: site.name, seo.home, legal.privacy
            $t->json('value')->nullable();     // JSON flexible
            $t->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('settings');
    }
};
