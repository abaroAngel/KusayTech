<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('offices', function (Blueprint $t) {
            $t->id();
            $t->string('name', 80);                 // Ej: "Puno", "Lima"
            $t->string('city', 120)->nullable();
            $t->string('address', 255)->nullable();
            $t->decimal('lat', 10, 7)->nullable();
            $t->decimal('lng', 10, 7)->nullable();
            $t->json('phones_json')->nullable();    // ["+51 967928806", "+51 ..."]
            $t->json('emails_json')->nullable();    // ["ventas@...", "contacto@..."]
            $t->text('map_embed')->nullable();      // iframe o url mapa
            $t->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('offices');
    }
};
