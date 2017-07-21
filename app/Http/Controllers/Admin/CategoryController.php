<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Log;
use App\Repository\CategoryRepository;
use App\Models\Category;
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

	/**
	 * Form thêm danh mục
	 * @author ThienTH
	 * @return view
	 * @date 2017-07-21 - create new
	 */
    public function create(){
    	Log::info("BEGIN " . get_class() . " => index()");

    	// lấy ra model mẫu
    	$model = new Category();


    	Log::info("END " . get_class() . " => index()");
    	return view('admin.cate.form', compact('model'));
    }
}
