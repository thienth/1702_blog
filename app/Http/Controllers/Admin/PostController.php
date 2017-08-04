<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(Request $request){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");

        // Get all category 
        $posts = CategoryRepository::GetAll($request);
        $keyword = $request->input('keyword');
        $ctlPageSize = $request->input('pageSize');

        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
        return view('admin.cate.list', compact('cates', 'keyword', 'ctlPageSize'));
    }
}
