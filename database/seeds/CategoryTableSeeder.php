<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i < 100; $i++) { 
            DB::table('categories')->insert(
                [
                    'cate_name' => $faker->realText($maxNbChars = 10),
                    'parent_id' => rand(1, 8)
                ]
            );
        }
    }
}
