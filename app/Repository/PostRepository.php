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

	public static function Destroy($id){
		Log::info('BEGIN ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');

		$model = Post::find($id);
		if(!$model){
			Log::info('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
			return false;
		}
		// begin transaction
		DB::beginTransaction();
		// try
		try{

	        $model->delete();
	        DB::commit();
	        // neu k co loi thi tien hanh return true
	        Log::info('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
	        return true;

	    // catch     
		}catch(\Exception $ex){
			// neu xay ra loi thi return false
			Log::error('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '() - ' . $ex->getMessage());
			DB::rollback();
			return false;
		}	
	}
	
}



 ?>