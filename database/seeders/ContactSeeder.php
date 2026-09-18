<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        $contacts = [
            ['type' => 'address', 'label' => 'Lokasi Gedung Perpustakaan', 'value' => 'Jalan Perpustakaan No. 1, Kampus USU, Padang Bulan, Medan, Sumatera Utara 20155', 'url' => 'https://maps.google.com/?q=Perpustakaan+Universitas+Sumatera+Utara', 'icon' => 'location_on', 'description' => 'Kampus USU Padang Bulan', 'sort_order' => 1],
            ['type' => 'phone', 'label' => 'Telepon Utama', 'value' => '(061) 8218666', 'url' => null, 'icon' => 'phone', 'description' => 'Informasi sirkulasi, keanggotaan, dan layanan umum', 'sort_order' => 2],
            ['type' => 'phone', 'label' => 'Telepon Kedua', 'value' => '(061) 8219093', 'url' => null, 'icon' => 'phone', 'description' => null, 'sort_order' => 3],
            ['type' => 'email', 'label' => 'Email Resmi', 'value' => 'libraryp@usu.ac.id', 'url' => 'mailto:libraryp@usu.ac.id', 'icon' => 'alternate_email', 'description' => 'Respon dalam 1–2 hari kerja', 'sort_order' => 4],
            ['type' => 'social_media', 'label' => 'Instagram Official', 'value' => '@usulibraryofficial', 'url' => 'https://www.instagram.com/usulibraryofficial', 'icon' => 'photo_camera', 'description' => null, 'sort_order' => 5],
            ['type' => 'social_media', 'label' => 'TikTok Official', 'value' => '@usulibrary', 'url' => 'https://www.tiktok.com/@usulibrary', 'icon' => 'music_note', 'description' => null, 'sort_order' => 6],
            ['type' => 'social_media', 'label' => 'X (Twitter) Official', 'value' => '@usulibrary', 'url' => 'https://x.com/usulibrary', 'icon' => 'tag', 'description' => null, 'sort_order' => 7],
            ['type' => 'website', 'label' => 'Universitas Sumatera Utara', 'value' => 'www.usu.ac.id', 'url' => 'https://www.usu.ac.id/', 'icon' => 'language', 'description' => null, 'sort_order' => 8],
        ];

        foreach ($contacts as $contact) {
            Contact::create($contact);
        }
    }
}
