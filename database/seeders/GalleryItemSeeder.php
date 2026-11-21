<?php

namespace Database\Seeders;

use App\Models\GalleryItem;
use Illuminate\Database\Seeder;

class GalleryItemSeeder extends Seeder
{
    public function run(): void
    {
        $photos = [1, 2, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19];

        foreach ($photos as $index => $photo) {
            GalleryItem::updateOrCreate(
                ['slug' => 'peedam-photo-'.$photo],
                ['title' => 'Agasthiya Mahashiva Nadi Peedam', 'media_type' => 'photo', 'image' => 'astrol/'.$photo.'.jpg', 'description' => 'A glimpse of the Peedam and the living Nadi tradition.', 'is_published' => true, 'sort_order' => $index + 1]
            );
        }

        foreach ([
            ['title' => 'The Nadi tradition explained', 'slug' => 'the-nadi-tradition-explained'],
            ['title' => 'A visit to Agastya Peedam', 'slug' => 'a-visit-to-agastya-peedam'],
            ['title' => 'Understanding a Nadi consultation', 'slug' => 'understanding-a-nadi-consultation'],
        ] as $index => $video) {
            GalleryItem::updateOrCreate(
                ['slug' => $video['slug']],
                $video + ['media_type' => 'video', 'description' => 'Video presentation will be added soon.', 'is_published' => true, 'sort_order' => 30 + $index]
            );
        }
    }
}
