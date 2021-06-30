@extends('admin.admin')

@section('title')

<title>Tạo Role</title>

@endsection

@section('css')
    <style>

        .card-body{
            background: rgb(118, 106, 141);
        }
    </style>
@endsection

@section('content')

  <div class="content-wrapper">
    @include('admin.content-header',['name' => 'Role' , 'key' => 'Add'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <form action="{{route('roles.store')}}" method="POST" style="width:100%;">
                <div class="col-md-12">
                    @csrf
                    <div class="form-group">
                        <label>Tên vai trò</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{old('name')}}"
                            placeholder="Nhập tên vai trò">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea
                            name="auth_name"
                            rows="6"
                            class="form-control @error('auth_name') is-invalid @enderror"
                            placeholder="Nhập mô tả">
                        </textarea>
                        @error('auth_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            <div class="col-md-12">
                <div class="row">
                    @foreach ($permissionParent as $per)
                    <div class="card border-warning mb-3 col-md-12">
                        <div class="card-header">
                            <label>
                                <input type="checkbox" value="" class="checkbox_wrapper">
                            </label>
                            {{$per->name}}
                        </div>
                        <div class="row">
                            @foreach ($per->permissionChildrent as $child)

                            <div class="card-body text-warning col-md-3">
                                <h5 class="card-title">
                                <label>
                                    <input type="checkbox" name="id_permission[]" value="{{$child->id}}" class="checkbox_childrent">
                                </label>
                                {{$child->name}}
                                </h5>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn btn-primary" style="margin-left: 220px;margin-top:10px">Đăng</button>
        </form>
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
    <script>
        $('.checkbox_wrapper').on('click',function(){
            $(this).parents('.card').find('.checkbox_childrent').prop('checked',$(this).prop('checked'));
        })
    </script>
@endsection
