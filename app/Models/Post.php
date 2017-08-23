<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    public $entityType = ENTITY_TYPE_POST;

    public $fillable = ['title', 'cate_id', 'short_desc', 'content', 'author', 'image'];

    public function category()
	{
	    return $this->belongsTo('App\Models\Category', 'cate_id');
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
