<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\UserInfo;
use Log;
use App\Http\Requests\SaveProfileRequest;
class ProfileController extends Controller
{
    public function update(){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");

    	$user = Auth::user();
    	$userInfo = UserInfo::where('id', $user->id)->first();

        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
    	return view('admin.profile.form', compact('user', 'userInfo'));
    }
    public function save(SaveProfileRequest $rq){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");

    	$model = UserInfo::where('id', Auth::user()->id)->first();
    	$model->fill($rq->all());
    	$model->save();

        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
    	return redirect(route('admin'));
    }
}
