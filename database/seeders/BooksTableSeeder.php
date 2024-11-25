<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            'title' => 'データベース',
            'writer' => '菊池雄星',
            'publisher' => 'ポリテクセンター関西',
            'price' => 1000,
            'isbn' => 123456789,
            'countReview' => 5,
            'avgPoint' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('books')->insert([
            'title' => '生産支援サーバサイドプログラミング',
            'writer' => '菊池康生',
            'publisher' => 'ICTエンジニア科',
            'price' => 1200,
            'isbn' => 234567891,
            'countReview' => 8,
            'avgPoint' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('books')->insert([
            'title' => 'Glasses',
            'writer' => '菊池大聖',
            'publisher' => 'Laravel',
            'price' => 2600,
            'isbn' => 345678912,
            'countReview' => 15,
            'avgPoint' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
