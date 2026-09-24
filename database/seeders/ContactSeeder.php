<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        $contacts = [
            [
                'nama' => 'Budi Santoso',
                'email' => 'budi.santoso@gmail.com',
                'telepon' => '081234567890',
                'pesan' => 'Saya ingin bertanya mengenai ketersediaan paket wisata pantai untuk rombongan keluarga besar pada akhir bulan ini.'
            ],
            [
                'nama' => 'Siti Nurhaliza',
                'email' => 'siti.nurhaliza@yahoo.com',
                'telepon' => '085712345678',
                'pesan' => 'Apakah lokasi wisata ini menyediakan fasilitas sewa alat selam atau kano secara langsung di tempat?'
            ],
            [
                'nama' => 'Rian Ardianto',
                'email' => 'rian.ardianto@hotmail.com',
                'telepon' => '082198765432',
                'pesan' => 'Halo pengelola, bisakah saya mendapatkan pricelist lengkap untuk penginapan atau gazebo area pantai?'
            ],
            [
                'nama' => 'Dewi Lestari',
                'email' => 'dewi.lestari@gmail.com',
                'telepon' => '081377889900',
                'pesan' => 'Mohon informasi alur reservasi spot foto dan gazebo untuk keperluan acara foto prewedding.'
            ]
        ];

        foreach ($contacts as $contact) {
            Contact::updateOrCreate(
                [
                    'email' => $contact['email'],
                    'telepon' => $contact['telepon']
                ],
                [
                    'nama' => $contact['nama'],
                    'pesan' => $contact['pesan']
                ]
            );
        }
    }
}
