@extends('admin.admin')

@section('title')

<title>Tạo User</title>

@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <style>
        .select2-selection__choice{
            background: rgb(179, 180, 92) !important;
        }
    </style>
@endsection

@section('content')

  <div class="content-wrapper">
    @include('admin.content-header',['name' => 'User' , 'key' => 'Add'])
    <div class="col-md-12">
        @if(Session::has('flag'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif
    </div>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('users.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                    <label>Tên user</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập Tên slide">
                        @error('name')
                            <div class="alert alert-danger" style="padding:5px 5px">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Nhập Email">
                            @error('email')
                                <div class="alert alert-danger" style="padding:5px 5px">{{ $message }}</div>
                            @enderror
                        </div>
                    <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Nhập Password">
                        @error('password')
                            <div class="alert alert-danger" style="padding:5px 5px">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Chọn phân quyền</label>
                        <select
                            name="id_role[]"
                            class="form-control select @error('id_role') is-invalid @enderror"
                            multiple>
                            <option value=""></option>
                            @foreach ($role as $roles)
                            <option value="{{$roles->id}}">{{$roles->name}}</option>
                            @endforeach
                        </select>
                        @error('id_role')
                            <div class="alert alert-danger" style="padding:5px 5px">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Đăng</button>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
  <aside class="control-sidebar control-sidebar-dark">

    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>

@endsection

@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admins/product/add/add.js') }}"></script>

@endsection
