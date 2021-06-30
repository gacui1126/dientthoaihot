<?php

namespace App\Http\Controllers;

use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Str;
use Storage;
use App\Slide;

class AdminSlideController extends Controller
{
    public function getSlide(){
        $slide = Slide::select('*')->paginate(8);
        return view('admin.page.slides.index',compact('slide'));
    }

    public function getSlideCreate(){
        return view('admin.page.slides.create');
    }

    use StorageImageTrait;
    public function postSlideStore(Request $req){

        $this->validate($req,
        [
            'name'=>'required|max:255|min:6|unique:slides,name'
        ],
        [
            'name.required'=>'Bạn cần nhập tên slide cần tạo',
            'name.max'=>'Tên không vượt quá 255 kí tự',
            'name.min'=>'Tên không được dưới 6 kí tự',
            'name.unique'=>'Tên đã tồn tại'
        ]);

        $data = [
            'name' => $req->name,
        ];
        $dataUpdate = $this->storageTraitUpload($req, 'slide');
        if(!empty($dataUpdate)){
            $data['image'] = $dataUpdate['file_name'];
            $data['image_path'] = $dataUpdate['file_path'];
        }
        // dd($data);
        $slide = Slide::create($data);
        return redirect()->back();
    }

    public function getSlideEdit($id){
        $slide = Slide::find($id);
        return view('admin.page.slides.edit',compact('slide'));
    }

    public function postSlideUpdate(Request $req,$id){
        $data =[ 'name' => $req->name ];

        $dataUpdate = $this->storageTraitUpload($req, 'slide');
        if(!empty($dataUpdate)){
            $data['image'] = $dataUpdate['file_name'];
            $data['image_path'] = $dataUpdate['file_path'];
        }
        $slide = Slide::find($id)->update($data);
        return redirect()->route('slide.index');
    }

    public function postSlideDelete($id){
        try{
            $slide = Slide::find($id)->delete();
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
