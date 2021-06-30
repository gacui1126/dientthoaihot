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

class AdminProductController extends Controller
{
    private $product;
    public function __construct(Product $product){
        $this->product = $product;
    }


    public function getCreateProduct(){
        $data = ProductType::all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive();
        return view('admin.page.products.create',compact('htmlOption'));
    }

    use StorageImageTrait;

    public function postProductStore(Request $req){
        $this->validate($req,
            [
                'name'=>'required|unique:products,name|max:255|min:6',
                'product_code'=>'required',
                'price'=>'required',
                'id_type'=>'required',
                'description'=>'required'
            ],
            [
                'name.required'=>'Bạn cần nhập tên sản phẩm',
                'name.unique'=>'Tên sản phẩm đã tồn tại',
                'name.max'=>'Tên sản phẩm không được vượt quá 255 kí tự',
                'name.min'=>'Tên sản phẩm không được dưới 6 kí tự',
                'product_code.required'=>'Bạn cần nhập mã sản phẩm',
                'price.required'=>'Bạn cần nhập giá sản phẩm',
                'id_type.required'=>'Bạn cần chọn danh mục',
                'description.required'=>'Bạn cần nhập mô tả sản phẩm',
            ]
            );

        $dataProduct = [
            'name' => $req->name,
            'product_code'=>$req->product_code,
            'unit_price' => $req->price,
            'description' => $req->description,
            'id_user' => auth()->id(),
            'id_type' => $req->id_type,
        ];
        $data = $this->storageTraitUpload($req, 'product');
        if(!empty($data)){
            $dataProduct['image'] = $data['file_name'];
            $dataProduct['image_path'] = $data['file_path'];
        }
        $product = $this->product->create($dataProduct);
        return redirect()->route('product.index');
    }
    public function getProduct(){
        $product_list = $this->product->paginate(8);
        return view('admin.page.products.index',compact('product_list'));
    }

    public function getProductEdit($id){
        $data = ProductType::all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive();
        $product = $this->product->find($id);
        return view('admin.page.products.edit',compact('product','htmlOption'));
    }
    public function postUpdateProduct(Request $req,$id){
        $dataUpdate = [
            'name' => $req->name,
            'product_code'=>$req->product_code,
            'unit_price' => $req->price,
            'description' => $req->description,
            'id_user' => auth()->id(),
            'id_type' => $req->id_type
        ];
        $data = $this->storageTraitUpload($req, 'product');
        if(!empty($data)){
            $dataUpdate['image'] = $data['file_name'];
            $dataUpdate['image_path'] = $data['file_path'];
        }
        $product = $this->product->find($id)->update($dataUpdate);
        return redirect()->route('product.index');
    }

    public function getProductDelete($id){
        try{
            $this->product->find($id)->delete();
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
