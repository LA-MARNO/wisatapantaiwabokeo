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
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();

            // Badge / Label kecil di atas title
            $table->string('badge')->default('Surga Pesisir Tersembunyi');

            // Judul utama (Baris 1 & Baris 2 yang berwarna/highlight)
            $table->string('title_line1')->default('Keindahan Alami');
            $table->string('title_highlight')->default('Pantai Wabokeo');

            // Deskripsi / Subtitle
            $table->text('description');

            // Background Image
            $table->string('background_image');

            // Tombol Utama (Primary CTA)
            $table->string('primary_button_text')->default('Jelajahi Sekarang');
            $table->string('primary_button_link')->default('/reservasi');

            // Tombol Kedua (Secondary CTA)
            $table->string('secondary_button_text')->default('Tonton Video');
            $table->string('secondary_button_link')->default('/jelajah');

            // Status aktif/tidaknya hero section
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
