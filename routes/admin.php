<?php 

Route::get('/', function(){

	dd('welcome to admin page');
});
Route::get('/add-category', function(){

	dd('admin => add category');
});

Route::group(['prefix' => 'category'], function(){
	Route::get('create', function(){
		dd('create category');
	});

	Route::get('save', function(){
		dd('save category');
	});
});
Route::get('login', function(){
	dd('login page');
})->name('login');
Route::group(['prefix' => 'post', 'middleware' => 'auth'], function(){
	Route::get('create', function(){
		dd('create post');
	});

	Route::get('save', function(){
		dd('save post');
	});
});

 ?>