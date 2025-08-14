<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('lead_attachments', function (Blueprint $t) {
            $t->id();
            $t->foreignId('lead_id')->constrained('leads')->cascadeOnDelete();
            $t->string('path');                // ruta en S3/local
            $t->string('original_name');       // nombre original
            $t->string('mime', 120)->nullable();
            $t->unsignedBigInteger('size')->nullable();
            $t->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('lead_attachments');
    }
};
