<?php 
/**
 * Dashboard
 */
Route::get('/', function(){
	dd(recursive_category("Nguyễn Ngọc Châm đẹp trai")); 
	return view('admin.dashboard');
});

/**
 * Category management
 */
Route::get('category', 
	'Admin\CategoryController@index')->name('cate.list');

Route::get('category/create', 
	'Admin\CategoryController@create')->name('cate.create');

Route::post('category/save', 
	'Admin\CategoryController@save')->name('cate.save');

Route::get('category/remove/{id}', 
	'Admin\CategoryController@remove')->name('cate.remove');

 ?>