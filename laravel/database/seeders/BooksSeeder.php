<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('books')->insert([
            'title' => $faker->text(25),
            'thumbnail' => 'https://animeweb.vip/wp-content/uploads/2024/07/tsue-to-tsurugi-no-wistoria-300x450.jpeg',
            'author' => $faker->text(10),
            'publisher' => $faker->text(10),
            'publication' => $faker->date(),
            'price' => rand(1800, 100000),
            'quantity' => rand(1, 100),
            'category_id' => rand(1, 5),
            ]);
        }
    }
}
