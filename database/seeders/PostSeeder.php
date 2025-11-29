<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Post::create([
            'title' => 'Postingan Pertama',
            'content' => '<p>Halo dunia! Selamat datang di postingan pertama blog baru saya. Ini adalah awal dari perjalanan digital yang menarik, di mana saya akan berbagi berbagai pemikiran, ide, dan pengalaman seputar pengembangan teknologi dan keseharian.</p>',
            'category_id'  => '1',
            'user_id'    => '1',
            'thumbnail'    => '/posts/hello-world.png',
            'slug'         => 'postingan-pertama-1',
            'status'       => 'Published'
            ]);
    }
}
