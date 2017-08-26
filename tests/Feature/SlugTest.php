<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Post;
class SlugTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCheckSlugGenerate()
    {
    	$title = "Bộ Công Thương lên tiếng vụ giáo sư âm nhạc Ngọc Sơn";
    	$slug = slug_generate($title);
    	$compareSlug = 'bo-cong-thuong-len-tieng-vu-giao-su-am-nhac-ngoc-son'. "-" . date('YmdHis', time());
        $this->assertTrue($compareSlug == $slug);
    }

    public function testCheckInsertToPost(){
    	$model = new Post();
    	$model->title = 'Bộ Công Thương lên tiếng vụ giáo sư âm nhạc Ngọc Sơn';
    	$this->assertTrue($model->save());
    	$model->delete();
    }

}
