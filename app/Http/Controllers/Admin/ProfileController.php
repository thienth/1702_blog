<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\UserInfo;
class ProfileController extends Controller
{
    public function update(){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");

    	$user = Auth::user();
    	$userInfo = UserInfo::where('id', $user->id)->first();

        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
    	return view('admin.profile.form', compact('user', 'userInfo'));
    }
}
