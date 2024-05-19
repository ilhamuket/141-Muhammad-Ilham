<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;

use App\Models\TmDataArticle;
use App\Models\TmRefCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
                $article = new TmDataArticle();
                $article->user_id = $user->id;
                $article->category_id = $categories->random()->id;
                $article->title = $faker->sentence;
                $article->content = $faker->paragraph(10);
                $article->save();
            }
        }
    }
}
