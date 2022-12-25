<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $categories = [
            ['name' => 'Buffalo', 'created_at' => $now],
            ['name' => 'Cheep', 'created_at' => $now],
            ['name' => 'Cow', 'created_at' => $now],
            ['name' => 'Goat', 'created_at' => $now],
            ['name' => 'Chicken', 'created_at' => $now],
            ['name' => 'Duck', 'created_at' => $now],
        ];
        Category::insert($categories);
    }
}
