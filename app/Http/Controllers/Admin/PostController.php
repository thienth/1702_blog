<?php

namespace App\Http\Controllers\Admin;
use Log;
use Illuminate\Http\Request;
use App\Http\Requests\SavePostRequest;
use App\Http\Controllers\Controller;
use App\Repository\PostRepository;
use App\Models\Post;
use App\Models\Category;
use App\Models\Slug;
class PostController extends Controller
{
    public function index(Request $request){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");

        // Get all category 
        $posts = PostRepository::GetAll($request);
        $keyword = $request->input('keyword');
        $ctlPageSize = $request->input('pageSize');

        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
        return view('admin.post.list', compact('posts', 'keyword', 'ctlPageSize'));
    }

    public function create(){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");

        // lấy ra model mẫu
        $model = new Post();
        $modelSlug = new Slug();
        $modelSlug->entity_type = $model->entityType;
        $modelSlug->entity_id = $model->id;
        $listCate = Category::all();
        $listCate = get_options($listCate);

        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
        return view('admin.post.form', compact('model', 'listCate', 'modelSlug'));
    }

    public function update($id){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");

        // lấy ra model mẫu
        $model = Post::find($id);
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
        return view('admin.post.form', compact('model', 'listCate', 'modelSlug'));
    }

    public function save(SavePostRequest $rq){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");
        $result = PostRepository::Save($rq);
        
        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
        
        if($result){
            return redirect(route('post.list'));
        }else{
            return 'Error';
        }
    }

    public function remove($id){
    	Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");

        $result = PostRepository::Destroy($id);
        
        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
        
        if($result){
            return redirect(route('post.list'));
        }else{
            return 'Error';
        }
    }
}
