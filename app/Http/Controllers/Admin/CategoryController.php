<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Log;
use App\Repository\CategoryRepository;
class CategoryController extends Controller
{
	/**
	 * Lấy danh sách danh mục
	 * @author ThienTH
	 * @return view
	 * @date 2017-07-21 - create new
	 */
    public function index(){
    	Log::info("BEGIN " . get_class() . " => index()");

    	// Get all category 
    	$cates = CategoryRepository::GetAll();


    	Log::info("END " . get_class() . " => index()");
    	return view('admin.cate.list', compact('cates'));
    }
}
