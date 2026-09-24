<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('title');                  // contoh: 'Area Pesisir Pasir Putih'
            $table->string('category');               // contoh: 'Rekreasi', 'Fotografi'
            $table->string('highlight')->nullable();   // contoh: 'Buka Setiap Hari'
            $table->string('image');                  // URL gambar atau path foto
            $table->text('description');              // Deskripsi lengkap
            $table->integer('order')->default(0);      // Urutan tampilan
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};
