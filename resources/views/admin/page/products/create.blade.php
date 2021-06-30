@extends('admin.admin')

@section('title')

<title>Tạo Sản Phẩm</title>

@endsection

@section('content')

  <div class="content-wrapper">
    @include('admin.content-header',['name' => 'Product' , 'key' => 'Add'])
    {{-- <div class="col md-12">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div> --}}
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input
                        type="text"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{old('name')}}"
                        placeholder="Nhập Tên Sản Phẩm">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Mã sản phẩm</label>
                    <input type="text" name="product_code" class="form-control @error('product_code') is-invalid @enderror" value="{{old('product_code')}}" placeholder="Nhập mã Sản Phẩm">
                    @error('product_code')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Giá</label>
                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}" placeholder="Nhập Giá Sản Phẩm">
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Ảnh</label>
                    <input type="file" name="image" class="form-control-file">
                </div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea name="description" class="form-control @error('desciption') is-invalid @enderror" rows="3">
                        {{old('description')}}
                    </textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Danh mục</label>
                    <select name="id_type" class="form-control @error('id_type') is-invalid @enderror" value="{{old('id_type')}}">
                        <option value="" >Chọn danh mục</option>
                      {{!!$htmlOption!!}}
                    </select>
                    @error('id_type')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary" style="margin-left: 220px;margin-top:10px">Đăng</button>
                    </div>
                </div>
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
    {{-- <script src="//cdn.tinymce.com/4/tinymce.min.js"></script> --}}
@endsection
