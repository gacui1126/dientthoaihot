<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Hash;
use Auth;
use DB;
use Log;

class AdminUserController extends Controller
{
    private $user;
    public function __constructor(User $user){
        $this->user = $user;
    }
    public function index(){
        $user = User::select('*')->paginate(8);
        return view('admin.page.user.index',compact('user'));
    }
    public function create(){
        $role = Role::all();
        return view('admin.page.user.create',compact('role'));
    }
    public function store(Request $req){
        $this->validate($req,
        [
            'name'=>'required|unique:users,full_name|max:255|min:6',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:30',
            'id_role'=>'required',
        ],
        [
            'name.required'=>'Bạn cần nhập tên user',
            'name.unique'=>'User này đã tồn tại',
            'name.min'=>'Tên user cần trên 6 kí tự',
            'name.max'=>'Tên user không được quá 100 kí tự',
            'email.required'=>'Bạn cần nhập Email',
            'email.email'=>'Bạn cần nhập đúng định dạng email',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Bạn cần nhập mật khẩu',
            'password.min'=>'Mật khẩu cần trên 6 kí tự',
            'password.max'=>'Mật khẩu cần ít hơn 30 kí tự',
            'id_role.required'=>'Bạn cần chọn phần quyền user'

        ]);
        try{
            DB::beginTransaction();
            $user = User::create([
                'full_name' => $req->name,
                'email' => $req->email,
                'password' =>Hash::make($req->password)
            ]);
            $user->roles()->attach($req->id_role);
            DB::commit();
        }catch(\Exception $exception){
            DB::rollBack();
            log::error('Message: ' .$exception->getMessage() . '---line:' . $exception->getLine());
        }
            return redirect()->route('users.index');
    }
    public function edit($id){
        $user = User::find($id);
        $role = Role::all();
        $roleof = $user->roles;
        // dd($roleof);
        return view('admin.page.user.edit',compact('user','role','roleof'));
    }
    public function update(Request $req, $id){
        $this->validate($req,
        [
            'name'=>'required|max:255|min:4',
            'email'=>'required|email',
            'password'=>'required|min:6|max:30',
            'id_role'=>'required',
        ],
        [
            'name.required'=>'Bạn cần nhập tên user',
            'name.min'=>'Tên user cần trên 6 kí tự',
            'name.max'=>'Tên user không được quá 100 kí tự',
            'email.required'=>'Bạn cần nhập Email',
            'email.email'=>'Bạn cần nhập đúng định dạng email',
            'password.required'=>'Bạn cần nhập mật khẩu',
            'password.min'=>'Mật khẩu cần trên 6 kí tự',
            'password.max'=>'Mật khẩu cần ít hơn 30 kí tự',
            'id_role.required'=>'Bạn cần chọn phần quyền user'

        ]);
        try{
            DB::beginTransaction();
            $user = User::find($id)->update([
                'full_name' => $req->name,
                'email' => $req->email,
                'password' =>Hash::make($req->password)
            ]);
            $users = User::find($id);
            $users->roles()->sync($req->id_role);
            DB::commit();
        }catch(\Exception $exception){
            DB::rollBack();
            log::error('Message: ' .$exception->getMessage() . '---line:' . $exception->getLine());
        }
            return redirect()->route('users.index');
    }
    public function delete($id){
        try{
            $user = User::find($id)->delete();
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
