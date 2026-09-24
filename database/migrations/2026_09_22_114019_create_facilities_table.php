<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('name');                 // contoh: 'Area Parkir Luas'
            $table->text('desc');                   // Deskripsi fasilitas
            $table->text('icon_svg')->nullable();   // Tag SVG / path SVG
            $table->integer('order')->default(0);     // Urutan tampilan
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('facilities');
    }
};
