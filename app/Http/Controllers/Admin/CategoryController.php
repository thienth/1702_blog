<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Log;
use Validator;
use App\Repository\CategoryRepository;
use App\Models\Category;
use App\Http\Requests\SaveCategoryRequest;
class CategoryController extends Controller
{
    /**
     * Lấy danh sách danh mục
     * @author ThienTH
     * @return view
     * @date 2017-07-21 - create new
     */
    public function index(Request $request){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");

        // Get all category 
        $cates = CategoryRepository::GetAll($request);
        $keyword = $request->input('keyword');
        $ctlPageSize = $request->input('pageSize');

        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
        return view('admin.cate.list', compact('cates', 'keyword', 'ctlPageSize'));
    }

    /**
     * Form thêm danh mục
     * @author ThienTH
     * @return view
     * @date 2017-07-21 - create new
     */
    public function create(){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");

        // lấy ra model mẫu
        $model = new Category();
        $listCate = Category::all();
        $listCate = get_options($listCate);

        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
        return view('admin.cate.form', compact('model', 'listCate'));
    }

    /**
     * Form cập nhật danh mục
     * @author ThienTH
     * @return view
     * @date 2017-07-28 - create new
     */
    public function update($id){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");

        // lấy ra model mẫu
        $model = Category::find($id);
        $listCate = Category::all();
        $listCate = get_options($listCate);

        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
        return view('admin.cate.form', compact('model', 'listCate'));
    }

    /**
     * Save category
     * @author ThienTH
     * @return view
     * @date 2017-07-21 - create new
     */
    public function save(SaveCategoryRequest $rq){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");
        // $this->validate($rq, [
        //     'cate_name' => 'required'
        // ], [
        //     'cate_name.required' => 'Vui lòng nhập dữ liệu cho tên danh mục'
        // ]);
        // 
        
        /*$validator = Validator::make($rq->all(), 
            [
                'cate_name' => 'required|min:5'
            ], 
            [
            'cate_name.required' => 'Vui lòng nhập dữ liệu cho tên danh mục',
            'cate_name.min' => 'Vui lòng nhập nhiều hơn 5 ký tự'
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }*/
        $result = CategoryRepository::Save($rq);
        
        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
        
        if($result){
            return redirect(route('cate.list'));
        }else{
            return 'Error';
        }
    }

	/**
	 * remove category
	 * @author ThienTH
	 * @return view
	 * @date 2017-07-21 - create new
	 */
    public function remove($id){
    	Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");

        $result = CategoryRepository::Destroy($id);
        
        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
        
        if($result){
            return redirect(route('cate.list'));
        }else{
            return 'Error';
        }
    }
}
