<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>profile</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{asset("adminlte/plugins/fontawesome-free/css/all.min.css")}}">
    <base href="{{asset('')}}">

    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{asset("adminlte/plugins/fontawesome-free/css/all.min.css")}}">
	<link rel="stylesheet" href="source/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/style.css">
	<link rel="stylesheet" href="source/assets/dest/css/animate.css">
    <link rel="stylesheet" title="style" href="source/assets/dest/css/huong-style.css">

<style>
    body {
        margin: 0;
        padding-top: 40px;
        color: #2e323c;
        background: #c5c5e9;
        position: relative;
        height: 100%;
 }
    .account-settings .user-profile {
        margin: 0 0 1rem 0;
        padding-bottom: 1rem;
        text-align: center;
    }
 .account-settings .user-profile .user-avatar {
        margin: 0 0 1rem 0;
 }
 .account-settings .user-profile .user-avatar img {
        width: 90px;
        height: 90px;
        -webkit-border-radius: 100px;
        -moz-border-radius: 100px;
        border-radius: 100px;
 }
 .account-settings .user-profile h5.user-name {
        margin: 0 0 0.5rem 0;
 }
 .account-settings .user-profile h6.user-email {
        margin: 0;
        font-size: 0.8rem;
        font-weight: 400;
        color: #9fa8b9;
 }
 .account-settings .about {
        margin: 2rem 0 0 0;
        text-align: center;
 }
 .account-settings .about h5 {
        margin: 0 0 15px 0;
        color: #007ae1;
 }
 .account-settings .about p {
        font-size: 0.825rem;
 }
 .form-control {
        border: 1px solid #cfd1d8;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        font-size: .825rem;
        background: #ffffff;
        color: #2e323c;
 }

 .card {
        background: #ffffff;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        border: 0;
        margin-bottom: 1rem;
 }
 .btn-file {
        position: relative;
        overflow: hidden;
 }
 .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 50px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        cursor: inherit;
        display: block;
}
.container{
    margin-top: 100px;
}
.header-profile{
    margin-left: 45%;
}
/* .modal-content{
    width: 120%;
} */
</style>

</head>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $err)
                {{$err}}
            @endforeach
        </div>
    @endif
<body>
    <div class="header-profile">
        <a class="btn btn-success" href="{{route('trang-chu')}}">Trang chủ</a>
        {{-- <a class="btn btn-info" href="{{route('bill.user')}}">Đơn hàng</a> --}}
        <!-- Button trigger modal -->
        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
            Đơn hàng
        </a>
        @include('page.repass')

        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Đơn hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Ngày đặt hàng</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col">Phương thức thanh toán</th>
                            <th scope="col">Ghi chú</th>
                            <th scope="col">Chi tiết đơn</th>
                          </tr>
                        </thead>
                        @foreach ($bill as $b)
                        <tbody>
                            <tr>
                              <th scope="row">{{$b->id}}</th>
                              <td>{{$b->date_order}}</td>
                              <td>{{$b->total}}</td>
                              <td>{{$b->payment}}</td>
                              <td>{{$b->note}}</td>
                              <td>
                                    <a href="{{route('bill.details',['id'=>$b->id])}}" class="btn btn-warning bill_details" data-toggle="modal" data-target="#exampleModal">
                                        Chi tiết đơn hàng
                                    </a>

                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table">
                                                    <thead>
                                                      <tr>
                                                        <th scope="col">Id</th>
                                                        <th scope="col">Ngày đặt hàng</th>
                                                        <th scope="col">Tổng tiền</th>
                                                        <th scope="col">Phương thức thanh toán</th>
                                                        <th scope="col">Ghi chú</th>

                                                      </tr>
                                                    </thead>
                                                    {{-- @foreach ($b as $c) --}}
                                                    <tr>
                                                        <th scope="row"></th>
                                                        {{-- <td>{{$b->date_order}}</td>
                                                        <td>{{$b->total}}</td>
                                                        <td>{{$b->payment}}</td>
                                                        <td>{{$b->note}}</td> --}}
                                                    </tr>

                                                  </table>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>

                              </td>
                            </tr>
                          </tbody>
                        @endforeach
                      </table>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
    </div>
 <div class="container">
     <div class="row gutters">
     <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
     <div class="card h-100">
         <div class="card-body">
             <div class="account-settings">
                 <div class="user-profile">
                     <div class="user-avatar">
                         <img src="{{$user->image_path}}" alt="image user">
                     </div>
                          <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="far fa-edit"></i>
                    </button>
                        <!-- Modal -->
                        <form method="POST" action="{{route('profile.img',['id'=>$user->id])}}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Thay đổi hình ảnh</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{$user->image_path}}"  width="150px">
                                            <input type="file" name="image" class="form-control-file">
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </form>

                     <h5 class="user-name">{{$user->full_name}}</h5>
                     <h6 class="user-email" >{{$user->email}}</h6>
                     <h6 class="user-email">Phone: {{$user->phone}}</h6>
                     <h6 class="user-email">Địa chỉ: {{$user->address}}</h6>

                 </div>
             </div>
         </div>
     </div>
    </div>
     <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
         <form action="{{route('update.profile.imformation',['id'=>$user->id])}}" method="POST">
            @csrf
            <div class="card h-100">
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mb-2 text-primary">Thông tin cá nhân</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fullName">Họ và tên</label>
                                <input type="text" name="full_name" class="form-control" id="fullName" value="{{$user->full_name}}">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="eMail">Email</label>
                                <input type="email" name="email" class="form-control" id="eMail" value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="phone">Điện thoại</label>
                                <input type="text" name="phone" class="form-control" id="phone" value="{{$user->phone}}">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="website">Địa chỉ</label>
                                <input type="text" name="address" class="form-control" id="website" value="{{$user->address}}">
                            </div>
                        </div>
                    </div>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-right">
                                <button type="submit" id="submit" name="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </form>

     </div>
     </div>
     </div>

  <script src="source/assets/dest/js/jquery.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script src="source/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
  <script src="source/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
  <script src="source/assets/dest/js/waypoints.min.js"></script>
  <script src="source/assets/dest/js/wow.min.js"></script>
</body>
</html>
