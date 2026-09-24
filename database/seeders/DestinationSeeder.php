<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    public function run(): void
    {
        $destinations = [
            [
                'title' => 'Area Pesisir Pasir Putih',
                'category' => 'Rekreasi',
                'highlight' => 'Buka Setiap Hari',
                'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=80',
                'description' => 'Hparan pasir putih lembut dipadu dengan ombak yang ramah, cocok untuk bersantai, berjemur, maupun bermain bersama keluarga.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Spot Foto Gazebo Sunset',
                'category' => 'Fotografi',
                'highlight' => 'Momen Sunset Terbaik',
                'image' => 'https://images.unsplash.com/photo-1519046904884-53103b34b206?auto=format&fit=crop&w=800&q=80',
                'description' => 'Gazebo bergaya pesisir yang menghadap langsung ke arah matahari terbenam. Tempat favorit pengabadi momen estetis.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Dermaga & Area Kano',
                'category' => 'Petualangan',
                'highlight' => 'Peralatan Lengkap',
                'image' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=800&q=80',
                'description' => 'Jelajahi perairan tenang di sekitar pantai menggunakan kano atau nikmati semilir angin laut di sepanjang dermaga kayu.',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($destinations as $item) {
            Destination::updateOrCreate(
                ['title' => $item['title']],
                $item
            );
        }
    }
}
