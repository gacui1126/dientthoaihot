<?php

namespace App\Http\Controllers;

use App\Traits\StorageImageTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\User;
use App\Bill;
use App\Customer;
use App\BillDetail;
use Storage;
use Hash;
use Auth;

class UserController extends Controller
{
    public function profile_index($id)
    {

        $user = User::find($id);
        $bill = Bill::where('id_user',$id)->get();


        return view('page.profile',compact('user','bill'));
    }
    use StorageImageTrait;

    public function profile_img(Request $req, $id){
        $dataUser=[];
        $data = $this->storageTraitUpload($req, 'profile');
        if(!empty($data)){

            $dataUser['image'] = $data['file_name'];
            $dataUser['image_path'] = $data['file_path'];
        }
        $img_profile = User::find($id)->update($dataUser);
        return redirect()->back();
    }
    public function update_imformation(Request $req, $id){
        $user = [
            'full_name' => $req->full_name,
            'email' => $req->email,
            'phone' => $req->phone,
            'address' => $req->address,
        ];
        User::find($id)->update($user);
        return redirect()->back();
    }
    public function update_password(Request $req){
        $this->validate($req,
        [
            'password_old' => 'required',
            'password_new' => 'required|min:6|max:30',
            'password_re'=>'required|same:password_new',
        ],
        [
            'password_new.min' => 'Mật khẩu không được dưới 6 kí tự',
            'password_new.max' => 'Mật khẩu không vượt quá 30 kí tự',
            'password_re.same' => 'Vui lòng nhập đúng mật khẩu mới'
        ]);


        if (!(Hash::check($req->password_old, Auth::user()->password))) {

            return redirect()->back()->with("error","Sai Mật khẩu. Nhập lại mật khẩu của bạn.");
        }
        if(strcmp($req->password_old, $req->password_new) == 0){
                // hàm strcmp so sánh chuỗi phân biệt chữ hoa chữ thường trả về 0 nếu bằng nhau
            return redirect()->back()->with("error","Mật khẩu mới không được giống mật khẩu cũ. Vui lòng chọn mật khẩu khác !!");
        }elseif(strcmp($req->password_new, $req->password_re) == 0){
            $user = Auth::user();
            $user->password = bcrypt($req->password_new);
            $user->save();
        }else{
            return redirect()->back()->with("error","Nhập lại mật khẩu bị sai. Vui lòng nhập chính xác!!");
        }
        return redirect()->back()->with("success","Đổi mật khẩu thành công!");
    }

}
