<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hadis', function (Blueprint $table) {
            $table->id();
            $table->text('text'); // Hadis metni
            $table->string('source')->nullable(); // Kaynak
            $table->string('image')->nullable(); // Görsel (isteğe bağlı)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hadis');
    }
};
