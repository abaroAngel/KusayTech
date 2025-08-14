<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('ethics_reports', function (Blueprint $t) {
            $t->id();

            $t->string('code', 30)->unique();           // Código de caso
            $t->boolean('is_anonymous')->default(false);

            $t->json('reporter_json')->nullable();      // si no es anónimo
            $t->string('subject', 200);
            $t->longText('detail');

            $t->enum('status', ['nuevo','en_revision','resuelto','descartado'])
              ->default('nuevo')->index();

            // Visibilidad interna
            $t->enum('visibility_scope', ['compliance_only','restricted'])
              ->default('compliance_only');

            $t->timestamps();
            $t->softDeletes();

            $t->index(['created_at','status']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('ethics_reports');
    }
};
