<?php 

Route::get('/', function(){

	return view('admin.dashboard');
});

Route::get('category', 
	'Admin\CategoryController@index')->name('cate.list');

 ?>