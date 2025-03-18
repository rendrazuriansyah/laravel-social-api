<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class CommentSeeder extends Seeder
{

    public function run(): void
    {
        $faker = Faker::create();

        DB::table('comments')->insert([
            [
                'user_id' => 1,
                'post_id' => 1,
                'content' => $faker->sentence(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'post_id' => 2,
                'content' => $faker->sentence(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
