<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slug;
use App\Models\Post;
class HomepageController extends Controller
{
    public function index(){
    	$cates = Category::all();
    	return view('client.homepage', compact('cates'));
    }

    public function getContent($slug){
    	$model =  Slug::where('slug', $slug)->first();
    	if(!$model){
    		return view('not-found');
    	}

    	switch ($model->entity_type) {
    		case ENTITY_TYPE_CATEGORY: // Slug dai dien cho 1 category
    			$cate = Category::find($model->entity_id);
    			$posts = Post::where('cate_id', $model->entity_id)->paginate(10);
    			return view('client.category', compact('cate', 'posts'));
    		case ENTITY_TYPE_POST: // Slug dai dien cho 1 bai viet
    			$post = Post::find($model->entity_id);
    			$cate = Category::find($post->cate_id);
    			return view('client.post', compact('cate', 'post'));
    		
    		default:
    			return view('forbidden');
    			break;
    	}
    }
}
