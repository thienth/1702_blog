<?php 
namespace App\Repository;
use Log;
use App\Models\Category;
class CategoryRepository
{
	public static function GetAll(){
		Log::info('BEGIN ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');

		Log::info('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
		return Category::all();
	}
	
}



 ?>