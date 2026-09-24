<?php

namespace Database\Seeders;

use App\Models\ContactInfo;
use Illuminate\Database\Seeder;

class ContactInfoSeeder extends Seeder
{
    public function run(): void
    {
        $contactInfos = [
            [
                'title' => 'Lokasi Pantai',
                'value' => 'Kawasan Pesisir Pantai Wabokeo, Kabupaten Buton, Sulawesi Tenggara.',
                'icon_type' => 'location',
                'bg_color' => '#0284C7',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Telepon / WhatsApp',
                'value' => '+62 812-3456-7890',
                'icon_type' => 'phone',
                'bg_color' => '#06B6D4',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Email Resmi',
                'value' => 'info@pantaiwabokeo.id',
                'icon_type' => 'email',
                'bg_color' => '#0284C7',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Jam Operasional',
                'value' => 'Senin - Minggu: 06.00 - 18.00 WITA',
                'icon_type' => 'clock',
                'bg_color' => '#06B6D4',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($contactInfos as $info) {
            ContactInfo::updateOrCreate(
                ['title' => $info['title']],
                $info
            );
        }
    }
}
