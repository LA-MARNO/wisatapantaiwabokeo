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
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('icon'); // Menyimpan emoji atau nama class icon (misal: '🌊')
            $table->string('title'); // Judul keunggulan (misal: 'Air Laut Jernih')
            $table->text('description'); // Deskripsi keunggulan
            $table->integer('order')->default(0); // Urutan tampilan di website
            $table->boolean('is_active')->default(true); // Status aktif/tampil
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('features');
    }
};
