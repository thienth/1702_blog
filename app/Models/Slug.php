<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slug extends Model
{
    protected $table = 'slugs';

    // Hàm kiểm tra xem 1 url có thể được insert vào csdl 
    // Return true - không hợp lệ, đã có 
    // Return false - hợp lệ, chưa tồn tại hoặc tự sửa url của chính mình
    public static function checkSlugExisted($entityType, $entityId, $slugUrl){
    	$model = Slug::where('slug', $slugUrl)->first();
		if(!$model){
			return false;
		}
		if($model->entity_type == $entityType && $model->entity_id == $entityId){
			return false;
		}
		return 	true;
    }
}
