<?php 
namespace App\Repository;
use Log;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use DB;
class PostRepository
{
	public static function GetAll(Request $request){
		Log::info('BEGIN ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');

		if($request->input('keyword') != "" || $request->input('pageSize') != ""){
			$keyword = $request->input('keyword');
			$pageSize = $request->input('pageSize');

			$postList = Post::where('title', 'like', "%$keyword%")->paginate($pageSize)->withPath("?keyword=$keyword&pageSize=$pageSize");

			Log::info('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
			return $postList;
		}else{
			Log::info('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
			$postList = Post::paginate(20);
			return $postList;
			
		}
	}
	
}



 ?>