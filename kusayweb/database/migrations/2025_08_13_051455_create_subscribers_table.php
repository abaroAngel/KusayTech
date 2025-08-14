<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('subscribers', function (Blueprint $t) {
            $t->id();
            $t->string('email')->unique();
            $t->string('name')->nullable();
            $t->enum('status', ['pending','active','unsubscribed'])->default('pending')->index();
            $t->uuid('token')->unique();
            $t->string('source', 60)->nullable(); // web, form, import, etc.
            $t->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('subscribers');
    }
};
