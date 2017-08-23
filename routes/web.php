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
use Illuminate\Support\Facades\Mail;
use App\Models\Category;
Route::get('/', 'Client\HomepageController@index')->name('homepage');

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
Route::get('send-mail', function(){
	$cates = Category::all();
	Mail::send('mail_template.test-send-mail', ['cates' => $cates], function ($message) {
	    $message->to('thienth32@gmail.com', 'Thien tran');
	    $message->cc('thanhnhan030796@gmail.com', 'Nhàn Hâm');
	    $message->replyTo('dailatoi12@gmail.com', 'Đại lé');
	    $message->subject('Danh sách danh mục của hệ thống');
	});
	return 'done!';
});

Route::get('/{slug}', 'Client\HomepageController@getContent');









