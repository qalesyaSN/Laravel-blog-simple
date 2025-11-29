<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kita tampung semua data di array dulu biar rapi
        $settings = [
            // --- 1. GENERAL SETTINGS (Identitas Website) ---
            [
                'setting_key'   => 'site_title',
                'setting_value' => 'Q-Blog',
                'description'   => 'Judul utama website yang tampil di tab browser'
            ],
            [
                'setting_key'   => 'site_tagline',
                'setting_value' => 'Berbagi Cerita & Inspirasi',
                'description'   => 'Slogan website (biasanya di bawah logo)'
            ],
            [
                'setting_key'   => 'site_description',
                'setting_value' => 'Q-Blog adalah platform berbagi artikel teknologi terkini.',
                'description'   => 'Deskripsi singkat website untuk footer atau SEO'
            ],
            [
                'setting_key'   => 'site_logo',
                'setting_value' => 'logo-default.png',
                'description'   => 'Nama file logo website'
            ],
            [
                'setting_key'   => 'site_favicon',
                'setting_value' => 'favicon.ico',
                'description'   => 'Icon kecil di tab browser'
            ],
            [
                'setting_key'   => 'site_footer_text',
                'setting_value' => 'All Rights Reserved.',
                'description'   => 'Teks hak cipta di bagian paling bawah'
            ],

            // --- 2. CONTACT INFO (Informasi Kontak) ---
            [
                'setting_key'   => 'contact_email',
                'setting_value' => 'admin@q-blog.com',
                'description'   => 'Email resmi untuk kontak'
            ],
            [
                'setting_key'   => 'contact_phone',
                'setting_value' => '+62 812-3456-7890',
                'description'   => 'Nomor telepon/WhatsApp'
            ],
            [
                'setting_key'   => 'contact_address',
                'setting_value' => 'Jl. Jendral Sudirman No. 1, Jakarta Pusat',
                'description'   => 'Alamat lengkap kantor/bisnis'
            ],
            [
                'setting_key'   => 'contact_maps',
                'setting_value' => 'https://maps.google.com/...',
                'description'   => 'Link atau Embed Google Maps'
            ],

            // --- 3. SEO CONFIGURATION (Untuk Google) ---
            [
                'setting_key'   => 'seo_keywords',
                'setting_value' => 'blog, teknologi, tutorial laravel, koding',
                'description'   => 'Kata kunci pencarian (pisahkan dengan koma)'
            ],
            [
                'setting_key'   => 'seo_author',
                'setting_value' => 'Nunu',
                'description'   => 'Nama penulis default untuk meta tag'
            ],
            [
                'setting_key'   => 'google_analytics_id',
                'setting_value' => 'UA-XXXXX-Y',
                'description'   => 'ID pelacakan Google Analytics'
            ],

            // --- 4. SOCIAL MEDIA (Link Sosmed) ---
            [
                'setting_key'   => 'social_facebook',
                'setting_value' => 'https://facebook.com/',
                'description'   => 'Link halaman Facebook'
            ],
            [
                'setting_key'   => 'social_twitter',
                'setting_value' => 'https://twitter.com/',
                'description'   => 'Link akun Twitter / X'
            ],
            [
                'setting_key'   => 'social_instagram',
                'setting_value' => 'https://instagram.com/',
                'description'   => 'Link akun Instagram'
            ],
            [
                'setting_key'   => 'social_youtube',
                'setting_value' => 'https://youtube.com/',
                'description'   => 'Link channel YouTube'
            ],
        ];


        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['setting_key' => $setting['setting_key']], // Cek berdasarkan key
                $setting // Data yang disimpan
            );
        }
    }
}
