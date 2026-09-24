<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();

            // Relasi Foreign Key ke tabel categories (Hapus foto jika kategori dihapus)
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();

            $table->string('title');
            $table->enum('span', ['normal', 'wide', 'tall'])->default('normal'); // Tipe layout grid
            $table->string('image'); // URL atau path file foto
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('photos');
    }
};
