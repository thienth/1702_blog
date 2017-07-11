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
use App\Models\Category;
use App\Models\Post;
Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Route::get('not-found', function(){
	echo "Oops! Notfound!";
})->name('notfound');
Route::get('/get-list-cate/{id?}', function($id = null){
	try{
		
		if($id != null){
			$listCates = Category::findOrFail($id);
		}else{
			$listCates = Category::orderBy('cate_name', 'desc')
									->orderBy('id', 'desc')->get();
		}

	}catch(\Exception $ex){
		
		return redirect(route('notfound'));
	}
	dd($listCates);
})->name('list-cate');
// Tìm kiếm trong bảng bài viết
Route::get('search/{keyword?}', function($keyword = ""){
	$listPost = Post::where('title', 'like', "%$keyword%")
						->orWhere('content', 'like', "%$keyword%")
						->orderBy('title')
						->get();
	dd($listPost);
});

// Demo thêm (insert) dữ liệu vào csdl
Route::get('/insert-cate/{catename}', function($cateName){
	$model = new Category();
	$model->cate_name = $cateName;
	$model->save();

	return redirect(route('list-cate', ['id' => $model->id]));
});

// demo update data
Route::get('update-cate/{id}/{newname}', function($id, $name){
	$model = Category::find($id);
	if($model){
		$model->cate_name = $name;
		$model->save();
	}
	return redirect(route('list-cate', ['id' => $id]));
	
});

// demo remove
Route::get('remove-cate/{id}', function($id){
	$model = Category::find($id);
	// xoa 1 record
	if($model){
		$model->delete([]);
	}
	// Xoa nhieu record
	// Category::destroy([6, 7]);
	return redirect(route('list-cate'));
	
});








