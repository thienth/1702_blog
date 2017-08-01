<?php 
/**
 * Dashboard
 */


Route::group(['middleware' => 'auth'], function(){
	
	Route::get('/', function(){
		return view('admin.dashboard');
	});

	/**
	 * Category management
	 */
	Route::get('category', 
		'Admin\CategoryController@index')->name('cate.list');

	Route::get('category/create', 
		'Admin\CategoryController@create')->name('cate.create');

	Route::get('category/edit/{id}', 
		'Admin\CategoryController@update')->name('cate.update');

	Route::post('category/save', 
		'Admin\CategoryController@save')->name('cate.save');

	Route::get('category/remove/{id}', 
		'Admin\CategoryController@remove')->name('cate.remove');
});


 ?>