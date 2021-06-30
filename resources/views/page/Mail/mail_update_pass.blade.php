@extends('master')
@section('content')


<div class="container">
    <div id="content">
        @php
            $token = $_GET['token'];
            $email = $_GET['email'];
        @endphp
        <div class="col-md-3">
        </div>
        <form action="{{route('mail.update_pass')}}" method="post" class="beta-form-checkout">
            @csrf
            <input type="hidden" name="token" value="{{$token}}">
            <input type="hidden" name="email" value="{{$email}}">

            <div class="col-md-9">

                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $err)
                            {{$err}}
                        @endforeach
                    </div>
                @endif

                @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
                @elseif(session()->has('msg'))
                <div class="alert alert-success">
                    {{ session()->get('msg') }}
                </div>
                @endif
                <strong>
                    <p style="font-size:30px">Nhập mật khẩu mới để thay đổi</p>
                </strong>
                    <div class="space20">&nbsp;</div>
                    <div class="form-block">
                        {{-- <label for="email">Địa Chỉ Email:</label> --}}
                        <input type="password" name="password_new" required placeholder="Nhập password ...">
                    </div>
                    <div class="form-block">
                        {{-- <label for="email">Địa Chỉ Email:</label> --}}
                        <input type="password" name="password_re" required placeholder="Nhập lại password ...">
                    </div>

                    <div style="margin-left:200px;" class="form-block">
                        <button type="submit" class="btn btn-success">Gửi</button>
                    </div>

            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
