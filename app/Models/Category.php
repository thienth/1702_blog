<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    public $entityType = ENTITY_TYPE_CATEGORY;

    public $fillable = ['cate_name', 'parent_id'];

    // public $timestamps = false;
     
    public function posts(){
    	return $this->hasMany('App\Models\Post', 'cate_id');
    }

    public function getParentName(){
    	if($this->parent_id == null || $this->parent_id == 0){
    		return null;
    	}

    	$parent = self::find($this->parent_id);
        if($parent)
    	   return $parent->cate_name;
        return null;
    }

    public function getTopPost($limit){
        $posts = Post::where('cate_id', $this->id)->limit($limit)->get();
        return $posts;
    }

    public function getSlug(){
        $slug = Slug::where([
                'entity_type' => $this->entityType,
                'entity_id' => $this->id
            ])->first();
        if($slug){
            return $slug->slug;
        }
        return null;
    }
}
