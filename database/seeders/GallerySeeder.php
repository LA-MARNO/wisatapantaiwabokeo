<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Photo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Kategori
        $categoryNames = ['Pemandangan', 'Aktivitas', 'Fasilitas', 'Sunset', 'Makanan'];
        $categories = [];

        foreach ($categoryNames as $name) {
            $categories[$name] = Category::updateOrCreate(
                ['name' => $name],
                ['slug' => Str::slug($name)]
            )->id;
        }

        // 2. Buat Foto Berelasi
        $photos = [
            [
                'title' => 'Garis Pesisir Pasir Putih',
                'category' => 'Makanan',
                'span' => 'wide',
                'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1200&q=80',
                'description' => 'Pemandangan terbentangnya pasir putih alami berpadu dengan jernihnya perairan laut Pantai Wabokeo.'
            ],
            [
                'title' => 'Momen Jingga Sunset',
                'category' => 'Sunset',
                'span' => 'tall',
                'image' => 'https://images.unsplash.com/photo-1519046904884-53103b34b206?auto=format&fit=crop&w=800&q=80',
                'description' => 'Keindahan sunset dramatis dengan gradasi warna jingga dan keemasan di atas garis cakrawala.'
            ],
            [
                'title' => 'Petualangan Kano Santai',
                'category' => 'Aktivitas',
                'span' => 'normal',
                'image' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=800&q=80',
                'description' => 'Aktivitas mendayung kano di perairan pesisir yang tenang dan ramah untuk pemula.'
            ],
            [
                'title' => 'Gazebo Istirahat tepi Pantai',
                'category' => 'Fasilitas',
                'span' => 'normal',
                'image' => 'https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=800&q=80',
                'description' => 'Area gazebo bersih dan teduh yang disiapkan bagi pengunjung untuk bersantai bersama keluarga.'
            ],
            [
                'title' => 'Siluet Deretan Kelapa',
                'category' => 'Pemandangan',
                'span' => 'tall',
                'image' => 'https://images.unsplash.com/photo-1512343879784-a960bf40e7f2?auto=format&fit=crop&w=800&q=80',
                'description' => 'Hiasan pepohonan kelapa yang memberikan kesejukan alami di pesisir pantai.'
            ],
            [
                'title' => 'Spot Dermaga Sunset',
                'category' => 'Sunset',
                'span' => 'wide',
                'image' => 'https://images.unsplash.com/photo-1495954222046-2c427ecb546d?auto=format&fit=crop&w=1200&q=80',
                'description' => 'Dermaga kayu estetis yang menjadi lokasi favorit pengabadi momen matahari terbenam.'
            ],
            [
                'title' => 'Keceriaan Bermain Air',
                'category' => 'Aktivitas',
                'span' => 'normal',
                'image' => 'https://images.unsplash.com/photo-1506953823976-52e1fdc0149a?auto=format&fit=crop&w=800&q=80',
                'description' => 'Sensasi kesegaran berenang dan bermain di tepi pantai dengan gelombang ombak yang aman.'
            ],
            [
                'title' => 'Area Parkir & Pusat Informasi',
                'category' => 'Fasilitas',
                'span' => 'normal',
                'image' => 'https://images.unsplash.com/photo-1590523741831-ab7e8b8f9c7f?auto=format&fit=crop&w=800&q=80',
                'description' => 'Fasilitas penunjang area parkir yang tertata rapi serta kemudahan layanan pengelola.'
            ]
        ];

        foreach ($photos as $photo) {
            Photo::updateOrCreate(
                ['title' => $photo['title']],
                [
                    'category_id' => $categories[$photo['category']],
                    'span' => $photo['span'],
                    'image' => $photo['image'],
                    'description' => $photo['description'],
                    'is_active' => true,
                ]
            );
        }
    }
}
