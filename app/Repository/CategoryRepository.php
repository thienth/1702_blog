<?php 
namespace App\Repository;
use Log;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;
class CategoryRepository
{
	public static function GetAll(Request $request){
		Log::info('BEGIN ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');

		if($request->input('keyword') != "" || $request->input('pageSize') != ""){
			$keyword = $request->input('keyword');
			$pageSize = $request->input('pageSize');

			$cateList = Category::where('cate_name', 'like', "%$keyword%")->paginate($pageSize)->withPath("?keyword=$keyword&pageSize=$pageSize");

			Log::info('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
			return $cateList;
		}else{
			Log::info('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
			$cateList = Category::paginate(20);
			$cateList = get_options($cateList, 2, "++");
			dd($cateList);
		}
	}

	public static function Save(Request $request){
		Log::info('BEGIN ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
		// begin transaction
		DB::beginTransaction();
		// try
		try{

			$model = new Category();
	        $model->fill($request->all());

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

		$model = Category::find($id);
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