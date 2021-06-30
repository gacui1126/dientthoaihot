@extends('master')

@section('css')
<style>
    input,
    .btn {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 4px;
    margin: 5px 0;
    opacity: 0.85;
    display: inline-block;
    font-size: 17px;
    line-height: 20px;
    text-decoration: none; /* remove underline from anchors */
    }
    .fb {
    background-color: #3B5998;
    color: white;
    }

    .google {
    background-color: #dd4b39;
    color: white;
    }
    .btn:hover {
    opacity: 1;
    }
</style>
@endsection
@section('content')


<div class="container">
    <div id="content">

        <form action="{{route('login')}}" method="post" class="beta-form-checkout">
            <input  type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    @if(Session::has('flag'))
                        <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
                    @endif
                    <h4 style="text-align:center">Đăng nhập</h4>
                    <div class="space20">&nbsp;</div>


                    <div class="form-block">
                        <label for="email">Địa Chỉ Email:</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="form-block">
                        <label for="phone">Mật Khẩu:</label>
                        <input type="password" name="password" required>
                    </div>
                    <div class="form-block" style="margin-left:410px">
                        <a href="{{route('password.forget')}}" style="color: blue">Bạn Quên Mật Khẩu?</a>
                    </div>

                    <div style="margin-left:200px;" class="form-block">
                        <button type="submit" class="btn btn-success">Đăng Nhập</button>
                    </div>
                    <div style="margin-left:200px;" class="form-block">
                        <div class="col">
                            <a href="{{route('login.facebook')}}" class="fb btn">
                                <i class="fab fa-facebook-f" style="font-size:1em"></i> Login with Facebook
                            </a>
                            <a href="{{route('login.google')}}" class="google btn">
                                <i class="fab fa-google" style="font-size:1em"></i></i> Login with Google+
                            </a>
                          </div>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
