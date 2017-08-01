<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function (){
	return 'homepage';
})->name('homepage');

Route::get('/403-forbidden', function(){
	return view('forbidden');
})->name('403.error');

Route::get('/logout', function(){
	Auth::logout();
	return redirect(route('login'));
})->name('logout');

Route::get('/login', function(){
	if(Auth::viaRemember()){
		return redirect("/admin");
	}
	return view('admin.auth.login');
})->name('login');
Route::post('/login', 'Auth\LoginController@login');

// Route::get('generate-pwd/{pwd}', function ($pwd){
// 	return Hash::make($pwd);
// });




