<?php

namespace App\Http\Controllers;

use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use Hash;
use Auth;
use App\Role;
use App\Comment;
use Socialite;
use Illuminate\Http\Request;




class PageController extends Controller
{
    //
    public function getIndex(){
        $slide = Slide::all();
        $products = Product::where('new',1)->paginate(4);
        $products_top = Product::select('*')->paginate(8);
        return view('page.trangchu',compact('slide','products','products_top'));
    }

    public function Product_all(){
        $product_type = Product::paginate(10);
        $type_left = ProductType::all();
        return view('page.product_type_all',compact('product_type','type_left'));
    }

    public function getProduct_Type($type){
        $product_type = Product::where('id_type', $type)->get();
        $type_left = ProductType::all();
        $loai_sp = ProductType::where('id', $type)->first();
        return view('page.product_type',compact('product_type','type_left','loai_sp'));
    }

    public function getProduct($id){

        $product = Product::find($id);
        $comments = Comment::all();
        foreach($comments as $comm){
            // dd($comm->id);
            $comment = $comm->id;
        }
        $product_like = Product::where('id_type',$product->id_type)->paginate(3);
        return view('page.product',compact('product','product_like','comment'));
    }

    public function getContact(){
        return view('page.contacts');
    }

    public function getAbout(){
        return view('page.about');
    }

    public function AddToCart(Request $req){
        $product = Product::find($req->id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$req->id);
        Session::put('cart',$cart);
        Session::save();
    }

    public function getDeleteCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getCheckout(){
        if(Session('cart')){
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        // dd($cart);
        return view('page.checkout',['product_cart'=>$cart->items, 'totalPrice'=>$cart->totalPrice, 'totalQty'=>$cart->totalQty]);
        }
    }

    public function postOrder(Request $req){
        $cart = Session::get('cart');
        // dd($cart);

        $customer = new Customer;
        $customer->id_user = $req->id_user;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone_number;
        $customer->note = $req->note;
        $customer->save();

        $bill = new Bill;
        $bill->id_user = Auth::user()->id;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->note;
        $bill->save();

        foreach($cart->items as $key => $value){
        $bill_detail = new BillDetail;
        $bill_detail->id_bill = $bill->id;
        $bill_detail->id_product = $key;
        $bill_detail->quantity = $value['qty'];
        $bill_detail->unit_price = $value['price']/$value['qty'];
        $bill_detail->save();
        }
        // dd($customer);
        Session::forget('cart');
        return view('page.checkout')->with('msg','Đặt hàng thành công');
    }

    public function getPageSignup(){
        return view('page.signup');
    }
    public function postSignup(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'full_name'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Bạn cần nhập email',
                'email.email'=>'Email không đúng',
                'email.unique'=>'Email đã được sử dụng',
                'password.required'=>'Bạn cần nhập mật khẩu',
                'password.min'=>'Mật khẩu cần 6 kí tự trợ lên',
                'password.max'=>'Mật khẩu vượt quá 20 kí tự',
                'full_name.required'=>'Bạn cần nhập tên người dùng',
                're_password.required'=>'Hãy nhập lại mật khẩu bạn đăng kí',
                're_password.same'=>'Mật khẩu không giống nhau'
            ]
            );
            $user = new User();
            $user->full_name = $req->full_name;
            $user->email = $req->email;
            $user->password = Hash::make($req->password);
            $user->phone = $req->phone;
            $user->address = $req->address;
            $user->save();

            return redirect()->back()->with('msg_signup_success','Đăng ký tài khoản thành công');
    }

    public function getPageLogin(){
        return view('page.login');
    }
    public function postLogin(Request $req){
        $this->validate($req,
        [
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
        ],
        [
            'email.required'=>'Vui lòng nhập email để đăng nhập',
            'email.email'=>'Email sai',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu sai',
            'password.max'=>'Mật khẩu sai'
        ]);
        if(Auth::attempt(['email' => $req->email, 'password' => $req->password])){
            return redirect()->route('trang-chu')->with(['flag'=>'success','message'=>'Đăng Nhập Thành Công.']);
        }else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Email hoặc mật khẩu sai.']);
        }
    }

    public function getLogout(){
        Auth::logout();
        Session::flush(); //huy session
        return redirect()->route('trang-chu');
    }

    public function getSearch(Request $req){
        //tim theo ten
        $product = Product::where('name','like','%'.$req->key.'%')->paginate(8);
        return view('page.search',compact('product'));
    }
    //login face
    public function redirectToFacebook(){
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback(){
        $user = Socialite::driver('facebook')->user();
        $this->_loginSocial($user);
        return redirect()->route('trang-chu');

    }
    //login google
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback(){
        $user = Socialite::driver('google')->user();
        $this->_loginSocial($user);
        return redirect()->route('trang-chu');

    }
    protected function _loginSocial($data){
        $user = User::where('email',$data->email)->first();
        if(!$user){
            $user =new User();
            $user->full_name = $data->name;
            $user->email = $data->email;
            $user->id_provider = $data->id;
            $user->image_path = $data->avatar;
            $user->save();
        }
        Auth::login($user);
    }
}
