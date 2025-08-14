<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('office_hours', function (Blueprint $t) {
            $t->id();
            $t->foreignId('office_id')->constrained('offices')->cascadeOnDelete();
            $t->tinyInteger('day_of_week');   // 0=Dom, 1=Lun, ... 6=Sáb
            $t->time('start_time');
            $t->time('end_time');
            $t->string('label', 80)->nullable(); // "Mañana", "Tarde", "Noche (WhatsApp)"
            $t->timestamps();

            $t->index(['office_id','day_of_week']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('office_hours');
    }
};
