<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::pluck('id');
        foreach ($category as $i => $item) {
            $subjects = [
                [
                    'name'           => 'Test Subject 1',
                    'user_id' => 1,
                    'category_id'    => $item,
                    'created_at'     => now(),
                    'updated_at'     => now(),
                ],
            ];
            Subject::insert($subjects);
        }
    }
}
