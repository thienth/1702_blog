<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    public $fillable = ['title', 'cate_id', 'short_desc', 'content', 'author', 'image'];

    public function category()
	{
	    return $this->belongsTo('App\Models\Category', 'cate_id');
	}
}
