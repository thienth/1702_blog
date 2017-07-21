<?php 
namespace App\Repository;
use Log;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;
class CategoryRepository
{
	public static function GetAll(){
		Log::info('BEGIN ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');

		Log::info('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
		return Category::all();
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
	
}



 ?>