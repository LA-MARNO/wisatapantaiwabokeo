<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_infos', function (Blueprint $table) {
            $table->id();
            $table->string('title');          // Judul info (misal: "Lokasi Pantai", "Email Resmi")
            $table->text('value');           // Isi info (misal: "info@pantaiwabokeo.id")
            $table->string('icon_type');      // Tipe ikon ('location', 'phone', 'email', 'clock')
            $table->string('bg_color')->default('#0284C7'); // Warna latar ikon
            $table->integer('order')->default(0);            // Urutan tampilan
            $table->boolean('is_active')->default(true);     // Status aktif/tidak
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_infos');
    }
};
