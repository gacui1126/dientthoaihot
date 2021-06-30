@extends('admin.admin')

@section('title')

<title>Tạo danh mục</title>

@endsection

@section('content')

  <div class="content-wrapper">
    @include('admin.content-header',['name' => 'Category' , 'key' => 'Add'])
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
            <form action="{{route('categories.store')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label>Tên danh mục</label>
                  <input type="text" name="name" class="form-control @error('title') is-invalid @enderror" placeholder="Nhập Tên Danh Mục">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  <div class="form-group">
                    <label>Danh Mục Cha</label>
                    <select name="parent_id" class="form-control">
                        <option value=0 >Danh mục cha</option>
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
