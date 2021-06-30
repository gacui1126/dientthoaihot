@extends('master')
@section('content')


<div class="container">
    <div id="content">

        <form action="{{route('password.re')}}" method="post" class="beta-form-checkout">
            @csrf
            <div class="col-md-3">

            </div>
            <div class="col-md-9">
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
                    <p style="font-size:30px">Nhập Email để đổi mật khẩu mới</p>
                </strong>
                    <div class="space20">&nbsp;</div>
                    <div class="form-block">
                        {{-- <label for="email">Địa Chỉ Email:</label> --}}
                        <input type="email" name="email" required placeholder="Nhập email...">
                    </div>
                    <div style="margin-left:200px;" class="form-block">
                        <button type="submit" class="btn btn-success">Gửi</button>
                    </div>

            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
