<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pages', function (Blueprint $t) {
            $t->id();
            $t->string('slug')->unique();
            $t->string('title');
            $t->longText('content_json')->nullable(); // bloques/sections en JSON
            $t->json('seo_json')->nullable();         // title, description, og, etc.
            $t->timestamp('published_at')->nullable();
            $t->timestamps();
            $t->softDeletes();
        });
    }
    public function down(): void {
        Schema::dropIfExists('pages');
    }
};
