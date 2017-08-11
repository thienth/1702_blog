<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\UserInfo;
use Log;
use App\Http\Requests\SaveProfileRequest;
use App\Http\Requests\SaveChangePasswordRequest;
use Hash;
class ProfileController extends Controller
{
    public function update(){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");

    	$user = Auth::user();
    	$userInfo = UserInfo::where('id', $user->id)->first();
    	if($userInfo == null){
    		$userInfo = new UserInfo();
    		$userInfo->id = $user->id;
    		$userInfo->save();
    	}

        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
    	return view('admin.profile.form', compact('user', 'userInfo'));
    }
    public function save(SaveProfileRequest $rq){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");

    	$model = UserInfo::where('id', Auth::user()->id)->first();
    	$model->fill($rq->all());
    	$model->save();
    	if($rq->hasFile('avatar')){
			$fileName = uniqid() . "." . $rq->avatar->extension();
			$rq->avatar->storeAs('uploads', $fileName);
			Auth::user()->avatar = 'uploads/'.$fileName;
			Auth::user()->save();
		}

        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
    	return redirect(route('admin'));
    }

    public function changePwdForm(){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");

        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
        return view('admin.profile.change-pwd');
    }

    public function saveChangePwd(SaveChangePasswordRequest $rq){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");
        if(Hash::check($rq->old_password, 
                Auth::user()->password)){
            $newPass = Hash::make($rq->new_password);
            Auth::user()->password = $newPass;
            Auth::logout();
            Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
            return redirect(route('login'));
        }
        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
        return redirect(route('password.change'))->with('errMsg', 'Invalid old password!');
    }
}
