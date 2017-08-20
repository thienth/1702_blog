<?php 
use Illuminate\Http\Request;
/**
 * Dashboard
 */
Route::post('/check-url', function(Request $request){
	$result = \App\Models\Slug::checkSlugExisted($request->entityType, $request->entityId, $request->slug);

	return response()->json($result);
})->name('slug.existed');
Route::get('/generate-slug', function(Request $request){
	$slug = str_slug(trim($request->title), '-');
	$slug .= "-" . date('YmdHis', time());
	return response()->json(['data' => $slug]);
})->name('slug.generate');
Route::group(['middleware' => 'auth'], function(){
	
	Route::get('/', function(){
		$cateCount = App\Models\Category::count();
		$postCount = App\Models\Post::count();
		return view('admin.dashboard', compact('cateCount', 'postCount'));
	})->name('admin');

	Route::get('/change-password', 'Admin\ProfileController@changePwdForm')->name('password.change');
	
	Route::post('/change-password', 'Admin\ProfileController@saveChangePwd');

	/**
	 * Profile
	 */
	Route::get('/profile', 'Admin\ProfileController@update')->name('profile.form');
	Route::post('/profile', 'Admin\ProfileController@save');

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