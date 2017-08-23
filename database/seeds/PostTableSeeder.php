<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
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
        	DB::table('posts')->insert(
        		[
        			'title' => $faker->realText($maxNbChars = 70),
        			'short_desc' => $faker->realText($maxNbChars = 150),
        			'content' => $faker->realText($maxNbChars = 500),
        			'author' => $faker->name,
        			'created_by' => -1,
                    'cate_id' => rand(2, 8)
        		]
    		);
        }
    }
}
