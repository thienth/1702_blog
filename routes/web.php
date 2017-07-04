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

Route::get('/', function () {
	dd(route('route-parameter', ['name' => 't3h', 'a' => '123456']));
    return view('welcome');
})->name('homepage');
Route::get('/route-parameter-thienth/{a}/{name}', function($a1){

	// process a->z
	dd(route('homepage'));
	return redirect(route('homepage'));
})->name('route-parameter');
Route::get('/optional-parameter/{a?}/{b}', function($a1 = "thienth"){

	dd($a1);
});

Route::get('user/{name}', function ($name) {
    dd($name);
})->where('name', '[A-Za-z]+');



