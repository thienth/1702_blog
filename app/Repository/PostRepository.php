<?php 
namespace App\Repository;
use Log;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

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

	public static function Save(Request $request){
		Log::info('BEGIN ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');

		// begin transaction
		DB::beginTransaction();
		// try
		try{
			if($request->id == null){
				$model = new Post();
	        	$model->created_by = Auth::user()->id;
			}else{
				$model = Post::find($request->id);
			}

	        $model->fill($request->all());
	        // upload image
			if($request->hasFile('upload_image')){
				$fileName = uniqid() . "." . $request->upload_image->extension();
				$request->upload_image->storeAs('uploads', $fileName);
				$model->image = 'uploads/'.$fileName;
			}
			// dd($model);
	        // $model->updated_by = Auth::user()->id;
	        $model->save();
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