<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    public function run(): void
    {
        $facilities = [
            [
                'name' => 'Area Parkir Luas',
                'desc' => 'Lahan parkir aman dan teratur untuk kendaraan roda dua maupun bus pariwisata.',
                'icon_svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Gazebo & Rest Area',
                'desc' => 'Tempat istirahat nyaman beratap yang tersebar di sepanjang pesisir pantai.',
                'icon_svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Toilet & Bilas Clean',
                'desc' => 'Fasilitas kamar mandi dan tempat bilas air bersih yang terawat dan higienis.',
                'icon_svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Pusat Kuliner & Kafeteria',
                'desc' => 'Menyediakan olahan makanan laut segar serta minuman dingin khas pantai.',
                'icon_svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($facilities as $item) {
            Facility::updateOrCreate(
                ['name' => $item['name']],
                $item
            );
        }
    }
}
