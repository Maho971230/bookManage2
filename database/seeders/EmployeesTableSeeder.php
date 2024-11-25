<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            'name' => '大阪太郎',
            'password' => 'osakataro',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('employees')->insert([
            'name' => '梅田花子',
            'password' => 'umedahanako',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('employees')->insert([
            'name' => '難波次郎',
            'password' => 'nambajiro',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
