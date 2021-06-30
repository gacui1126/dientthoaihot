@extends('master')
@section('content')

{{-- <div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng kí</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Home</a> / <span>Đăng kí</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div> --}}

<div class="container">
    <div id="content">

        <form action="{{route('signup')}}" method="post" class="beta-form-checkout">
            <input  type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row">
                <div class="col-sm-3"></div>

                <div class="col-sm-6">

                    @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $err)
                            {{$err}}
                        @endforeach
                    </div>
                    @endif
                    @if(Session::has('msg_signup_success'))
                        <div class="alert alert-success">{{Session::get('msg_signup_success')}}</div>
                    @endif

                    <h4 style="text-align:center">Đăng kí</h4>
                    <div class="space20">&nbsp;</div>


                    <div class="form-block">
                        <label for="email">Địa Chỉ Email*</label>
                        <input type="email" name="email" id="email" required>
                    </div>

                    <div class="form-block">
                        <label for="full_name">Họ Tên*</label>
                        <input type="text" name="full_name" required>
                    </div>

                    <div class="form-block">
                        <label for="adress">Địa Chỉ*</label>
                        <input type="text" name="address" required>
                    </div>
                    <div class="form-block">
                        <label for="phone">Số Điện Thoại*</label>
                        <input type="text" name="phone" required>
                    </div>
                    <div class="form-block">
                        <label for="phone">Mật Khẩu*</label>
                        <input type="password" name="password" required>
                    </div>
                    <div class="form-block">
                        <label for="phone">Nhập Lại Mật Khẩu*</label>
                        <input type="password" name="re_password" required>
                    </div>
                    <div style="margin-left:330px" class="form-block">
                        <button type="submit" class="btn btn-success">Đăng Kí</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
