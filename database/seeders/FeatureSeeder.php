<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    public function run(): void
    {
        $features = [
            [
                'icon' => '🌊',
                'title' => 'Pemandangan Laut',
                'description' => 'Kondisi air perairan pantai yang bersih, aman, dan sangat cocok untuk aktivitas renang maupun rekreasi air.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'icon' => '🏖️',
                'title' => 'Pasir Halus',
                'description' => 'Garis pantai luas dilapisi pasir alami yang nyaman untuk bersantai bersama keluarga dan kerabat.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'icon' => '🌅',
                'title' => 'Pemandangan Sunset',
                'description' => 'Lokasi strategis menghadap cakrawala utara-barat untuk menikmati momen matahari terbenam memukau.',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'icon' => '🌴',
                'title' => 'Fasilitas Lengkap',
                'description' => 'Tersedia gazebo bersantai, area kuliner pesisir, toilet bersih, serta area parkir yang luas dan aman.',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($features as $feature) {
            Feature::updateOrCreate(
                ['title' => $feature['title']],
                $feature
            );
        }
    }
}
