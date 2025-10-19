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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul program
            $table->text('description')->nullable(); // Deskripsi program
            $table->enum('gelombang', ['1', '2', '3']); // Gelombang ditentukan sekolah
            $table->json('brosur')->nullable(); // Menyimpan array path gambar brosur (max 5)
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
