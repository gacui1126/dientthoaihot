@extends('admin.admin')

@section('title')

<title>Tạo Sản Phẩm</title>

@endsection

@section('content')

  <div class="content-wrapper">
    @include('admin.content-header',['name' => 'Product' , 'key' => 'Add'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            <form action="{{route('product.update',['id' => $product->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control" value="{{$product->name}}" placeholder="Nhập Tên Sản Phẩm">
                    <label>Mã sản phẩm</label>
                    <input type="text" name="product_code" class="form-control" value="{{$product->product_code}}" placeholder="Nhập mã Sản Phẩm">
                    <label>Giá</label>
                    <input type="text" name="price" class="form-control" value="{{$product->unit_price}}" placeholder="Nhập Giá Sản Phẩm">
                    <div class="form-group">
                    <label>Ảnh</label>
                    <div class="col-md-12">
                        <div class="row">
                            <img src="{{$product->image_path}}" height="250px">
                        </div>
                    </div>
                    <input type="file" name="image" class="form-control-file">

                    <label>Nội dung</label>
                    <textarea name="description" class="form-control" rows="3">{{$product->description}}</textarea>
                    <label>Danh mục</label>
                    <select name="id_type" value="{{$product->product_type}}" class="form-control">
                        <option>Chọn danh mục</option>
                      {{!!$htmlOption!!}}
                    </select>
                  </div>
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
    {{-- <script src="//cdn.tinymce.com/4/tinymce.min.js"></script> --}}
@endsection
