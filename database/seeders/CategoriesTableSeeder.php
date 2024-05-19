<?php

namespace Database\Seeders;

use App\Models\TmRefCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TmRefCategory::create(['name' => 'Frontend Development']);
        TmRefCategory::create(['name' => 'Backend Development']);
        TmRefCategory::create(['name' => 'Full-Stack Development']);
        TmRefCategory::create(['name' => 'UI/UX Design']);
        TmRefCategory::create(['name' => 'Quality Assurance (QA)']);
    }
}
