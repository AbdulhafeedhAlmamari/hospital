<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\File;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        // إنشاء 10 بطاقات
        for ($i = 1; $i <= 5; $i++) {
            $card = Post::create([
                'title' => "Title $i",
                'image_path' => "https://via.placeholder.com/640x480?text=Card+$i",
            ]);

            // إنشاء 3 عناوين فرعية لكل بطاقة
            for ($j = 1; $j <= 3; $j++) {
                $subTitle = File::create([
                    'post_id' => $card->id,
                    'parent_id' => null, // لا يوجد عنوان فرعي أعلى
                    'title' => "SubTitle $j for Card $i",
                    'pdf_path' => $j % 2 == 0 ? "1.pdf" : null, // بعض العناوين تحتوي على PDF
                ]);

                // إنشاء 2 عنوان فرعي لكل عنوان فرعي
                for ($k = 1; $k <= 2; $k++) {
                    File::create([
                        'post_id' => $card->id,
                        'parent_id' => $subTitle->id,
                        'title' => "SubSubTitle $k for SubTitle $j of Card $i",
                        'pdf_path' => null, // لا تحتوي على PDF
                    ]);
                }
            }
        }
    }
}
