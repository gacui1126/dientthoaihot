@extends('admin.admin')

@section('title')

<title>Chỉnh sửa danh mục</title>

@endsection

@section('content')

  <div class="content-wrapper">
    @include('admin.content-header',['name' => 'Category' , 'key' => 'Edit'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            <form action="{{route('categories.update',['id' => $category->id])}}" method="POST">
                @csrf
                <div class="form-group">
                  <label>Tên danh mục</label>
                  <input type="text" name="name" value="{{$category->name}}" class="form-control" placeholder="Nhập Tên Danh Mục">
                  <div class="form-group">
                    <label>Danh Mục Cha</label>
                    <select name="parent_id" class="form-control">
                        <option value="{{$category->parent_id}}" >Danh mục cha</option>
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
