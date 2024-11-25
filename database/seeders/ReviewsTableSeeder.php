<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            'employee_id' => '1',
            'book_id' => '1',
            'content' => 'おもしろいです',
            'rating' => '4',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'employee_id' => '2',
            'book_id' => '3',
            'content' => '楽しいです',
            'rating' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'employee_id' => '3',
            'book_id' => '2',
            'content' => '微妙でした',
            'rating' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
