<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = 'user_info';
    public $fillable = ['full_name', 'facebook', 'website', 'birth_date'];
    public function GetUser(){
        return $this->hasOne('App\User', 'id', 'id');
    }
}
