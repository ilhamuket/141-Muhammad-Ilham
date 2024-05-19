<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\TmDataArticle;
use App\Models\TmRefCategory;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Get all users and categories
        $users = User::all();
        $categories = TmRefCategory::all();

        // Loop through each user and create articles
        foreach ($users as $user) {
            foreach (range(1, 5) as $index) {
                // Generate a random image using Faker
                $imageUrl = $faker->imageUrl(640, 480, 'articles', true, 'Faker');

                // Save the image locally (optional, for better control over images)
                $imageContents = file_get_contents($imageUrl);
                $imageName = 'articles/' . $faker->unique()->md5 . '.jpg';
                Storage::put('public/' . $imageName, $imageContents);

                // Create the article with the generated image
                TmDataArticle::create([
                    'user_id' => $user->id,
                    'category_id' => $categories->random()->id,
                    'title' => $faker->sentence,
                    'content' => $faker->paragraph(10),
                    'image' => 'storage/' . $imageName
                ]);
            }
        }
    }
}
