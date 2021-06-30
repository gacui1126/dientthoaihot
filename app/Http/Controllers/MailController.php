<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class MailController extends Controller
{
    //test mail
    public function send_mail(){
        $to_name = "Dien Thoai Hot";
        $to_email = "gacui1126@gmail.com";//send to this email

        $data = array('name'=>'Điện thoại Hot','body'=>''); //body of mail.blade.php

        Mail::send('page.Mail.mail',$data,function($message) use ($to_name,$to_email){
            $message->to($to_email)->subject('test Mail');//send this mail with subject
            $message->from($to_email,$to_name);//send from this mail
        });
        //--send mail
        // return route('trang-chu');
    }

    //send mail forget pass
    public function forget_password(){
        return view('page.Mail.forget_password');
    }

    public function re_password(Request $req){
        $data = $req->email;
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $title_mail = "Quên mật khẩu DIENTHOAIHOT.COM".' '.$now;

        $user = User::where('email',$data)->first();

        if($user){
                $token_random = Str::random();
                $user = User::find($user->id);
                $user->remember_token = $token_random;
                $user->save();

                $link_reset_pass = url('page-update-pass?email='.$data.'&token='.$token_random);

                $data = ([
                    'name'=>$title_mail,
                    'body'=>$link_reset_pass,
                    'email'=>$data,
                ]);

                Mail::send('page.Mail.mail_forget_pass',['data'=>$data],function($message) use ($title_mail,$data){
                    $message->to($data['email'])->subject($title_mail);//send this mail with subject
                    $message->from($data['email'],$title_mail);//send from this mail
                });
            return redirect()->back()->with('msg','Gửi mail thành công, vui lòng vào mail để lấy mật khẩu');
            }
        else{
            return redirect()->back()->with('error','Email này chưa được đăng ký, vui lòng nhập đúng email đã đăng ký');
        }
    }
    public function page_update_pass(){
        return view('page.Mail.mail_update_pass');
    }
    public function mail_update_password(Request $req){

        $user = User::where('email',$req->email)->where('remember_token',$req->token)->first();

        if($user){
            $token_new = Str::random();
            $this->validate($req,
            [
                'password_new' => 'required|min:6|max:30',
                'password_re' => 'required|same:password_new'
            ],
            [
                'password_new.min' => 'Mật khẩu không được dưới 6 kí tự . ',
                'password_new.max' => 'Mật khẩu không được vượt quá 30 kí tự . ',
                'password_re.same' => 'Mật khẩu nhập lại không khớp . ',
            ]);

            $user = new User();
            $user->password = md5($req->password_new);
            $user->remember_token = $token_new;
            $user->save();
            return redirect()->back()->with('msg','Thay đổi mật khẩu thành công');
        }
    }
}
