{{-- @extends('master')
@section('css')
    <style>
        .edit-user{
            margin-top: 50px;
            margin-bottom: 200px;
            border: 1px solid #000;
        }
    </style>
@endsection
@section('content')
<div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-6 edit-user">
        <div>
            <form method="POST" action="" enctype>
                <div class="form-group">
                    <label>Họ và tên</label>
                    <input type="text" class="form-control" value="{{$user->full_name}}">
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="password" class="form-control" value="{{$user->address}}">
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="password" class="form-control" value="{{$user->phone}}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" value="{{$user->image}}">
                </div>
                <button type="submit" class="btn btn-primary">Đăng</button>
            </form>
        </div>
    </div>
</div>
@endsection --}}
