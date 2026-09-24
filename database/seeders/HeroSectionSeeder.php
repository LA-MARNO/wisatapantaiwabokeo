<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Seeder;

class HeroSectionSeederHeroSectionSeeder extends Seeder
{
    public function run(): void
    {
        HeroSection::create([
            'badge' => 'Pesona Pulau Karang | Batuatas',
            'title_line1' => 'Keindahan Alami',
            'title_highlight' => 'Pantai Wabokeo',
            'description' => 'Nikmati hamparan pasir putih bersih, deburan ombak yang menenangkan, dan pemandangan matahari terbenam yang memukau.',
            'background_image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=2000&q=80',
            'primary_button_text' => 'Jelajahi Sekarang',
            'primary_button_link' => '/reservasi',
            'secondary_button_text' => 'Tonton Video',
            'secondary_button_link' => '/jelajah',
            'is_active' => true,
        ]);
    }
}
