<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use App\Models\TmDataArticle;
use App\Models\CommentArticle;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Get all users and articles
        $users = User::all();
        $articles = TmDataArticle::all();

        // Loop through each article and create comments
        foreach ($articles as $article) {
            foreach (range(1, rand(1, 5)) as $index) {
                $comment = new CommentArticle();
                $comment->user_id = $users->random()->id;
                $comment->article_id = $article->id;
                $comment->content = $faker->sentence;
                $comment->save();
            }
        }
    }
}
