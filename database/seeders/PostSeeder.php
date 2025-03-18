<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        DB::table('posts')->insert([
            [
                'user_id' => 1,
                'content' => $faker->text(),
                'image_url' => 'https://placehold.co/300',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'content' => $faker->text(),
                'image_url' => 'https://placehold.co/300',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
