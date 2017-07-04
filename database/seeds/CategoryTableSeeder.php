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

    	$cates = [
    		[
        		'cate_name' => "Thể thao",
        		'parent_id' => null
        	],
        	[
        		'cate_name' => "Thể dục",
        		'parent_id' => 2
        	],
        	[
        		'cate_name' => "Giáo dục",
        		'parent_id' => null
        	],
        	[
        		'cate_name' => "An ninh",
        		'parent_id' => null
        	],
        	[
        		'cate_name' => "Giao thông",
        		'parent_id' => null
        	]
    	];
        DB::table('categories')->insert($cates);
    }
}
