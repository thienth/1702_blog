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
	Route::group(['middleware' => 'check-mod'], function(){
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

		Route::get('post', 
			'Admin\PostController@index')->name('post.list');

		Route::get('post/remove/{id}', 
			'Admin\PostController@remove')->name('post.remove');

		Route::get('post/create', 
			'Admin\PostController@create')->name('post.create');
		
		Route::post('post/save', 
			'Admin\PostController@save')->name('post.save');

		Route::get('post/edit/{id}', 
			'Admin\PostController@update')->name('post.update');

	});
	
});


 ?>