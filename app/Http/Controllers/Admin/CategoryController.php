<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Log;
use Validator;
use App\Repository\CategoryRepository;
use App\Models\Category;
use App\Http\Requests\SaveCategoryRequest;
use App\Models\Slug;
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

        $modelSlug = new Slug();
        $modelSlug->entity_type = $model->entityType;
        $modelSlug->entity_id = $model->id;
        
        $listCate = Category::all();
        $listCate = get_options($listCate);

        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
        return view('admin.cate.form', compact('model', 'listCate', 'modelSlug'));
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
        $modelSlug = Slug::where([
                        'entity_type'=> $model->entityType,
                        'entity_id'=> $model->id
                                ])->first();
        if(!$modelSlug){
            $modelSlug = new Slug();
            $modelSlug->entity_type = $model->entityType;
            $modelSlug->entity_id = $model->id;
        }
        
        $listCate = Category::all();
        $listCate = get_options($listCate);

        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
        return view('admin.cate.form', compact('model', 'listCate', 'modelSlug'));
    }

    /**
     * Save category
     * @author ThienTH
     * @return view
     * @date 2017-07-21 - create new
     */
    public function save(SaveCategoryRequest $rq){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");
        
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
