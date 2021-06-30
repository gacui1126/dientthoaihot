@extends('admin.admin')

@section('title')

<title>Tạo slide</title>

@endsection

@section('content')

  <div class="content-wrapper">
    @include('admin.content-header',['name' => 'Slide' , 'key' => 'Add'])
    {{-- <div class="col-md-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $err )
                <li>{{$err}}</li>
            @endforeach
        </div>
        @endif
    </div> --}}
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('slide.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <label>Tên slide</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập Tên slide">
                        @error('name')
                            <div class="alert alert-danger" style="padding:5px 5px">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Ảnh</label>
                        <input type="file" name="image" class="form-control-file">
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
