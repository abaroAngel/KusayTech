<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('carts', function (Blueprint $t) {
            $t->id();
            $t->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $t->string('session_id', 100)->nullable()->index();
            $t->enum('status', ['open','converted','abandoned'])->default('open')->index();
            $t->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('carts');
    }
};
