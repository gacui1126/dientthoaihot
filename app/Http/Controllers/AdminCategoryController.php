<?php

namespace App\Http\Controllers;

use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use App\ProductType;
use App\Product;
use App\Components\Recusive;
use Illuminate\Support\Str;
use Storage;
use App\Slide;

class AdminCategoryController extends Controller
{
    private $category;
    public function __construct(ProductType $category, Product $product, Slide $slide){
        $this->category = $category;
        $this->product = $product;
        $this->slide = $slide;
    }
    public function getCreate(){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive();
        $product = $this->product->all();

        return view('admin.page.categories.create',compact('htmlOption','product'));
    }
    public function postCategoryStore(Request $req){
        $this->validate($req,[
            'name'=>'required|unique:product_types,name|max:255|min:3',
        ],[
            'name.required'=>'Bạn cần nhập tên danh mục',
            'name.unique'=>'Tên danh mục đã tồn tại',
            'name.max'=>'Tên danh mục cần dưới 255 kí tự',
            'name.min'=>'Tên sản phẩm cần trên 3 kí tự'
        ]);

        $this->category->create([
            'name'=>$req->name,
            'parent_id'=>$req->parent_id
        ]);
        return redirect()->route('categories.index');
    }
    //edit

    public function getCategory(){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive();
        return $htmlOption;
    }

    public function getEdit($id){
        $htmlOption = $this->getCategory();
        $category = $this->category->find($id);
        return view('admin.page.categories.edit',compact('category','htmlOption'));
    }

    public function getUpdate(Request $req,$id){
        $this->category->find($id)->update([
            'name'=>$req->name,
            'parent_id'=>$req->parent_id
        ]);
        return redirect()->route('categories.index');
    }

    public function getIndex(){
        $category = $this->category->latest()->paginate(5);
        return view('admin.page.categories.index',compact('category'));
    }

    public function getDelete($id){
        try{
            $this->category->find($id)->delete();
            return response()->json([
                'code' => 200,
                'massage' =>'update success',
            ], 200);
        }catch(\Exception $exception){
            log::error('Message: ' .$exception->getMessage() . '---line:' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'massage' =>'update fail',
            ], 500);
        }
    }

}
