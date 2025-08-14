<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('claim_attachments', function (Blueprint $t) {
            $t->id();
            $t->foreignId('claim_id')->constrained('claims')->cascadeOnDelete();
            $t->string('path');                 // ruta S3/local
            $t->string('original_name');
            $t->string('mime', 120)->nullable();
            $t->unsignedBigInteger('size')->nullable();
            $t->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('claim_attachments');
    }
};
