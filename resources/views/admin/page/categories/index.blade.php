@extends('admin.admin')

@section('title')

<title>Danh mục sản phẩm</title>

@endsection

@section('content')

  <div class="content-wrapper">
    @include('admin.content-header',['name' => 'Category' , 'key' => 'List'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
            @can('create_category')
            <div class="col-md-12">
                <a href="{{route('categories.create')}}" class="btn btn-success float-right m-12">Thêm danh mục</a>
            </div>
            @endcan

            <div class="col-md-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Tuỳ biến</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($category as $categories)

                  <tr>
                    <th scope="row">{{$categories->id}}</th>
                    <td>{{$categories->name}}</td>
                    <td>
                        @can('update_category')
                        <a href="{{route('categories.edit',['id'=>$categories])}}" class="btn btn-success">Sửa</a>
                        @endcan
                        @can('delete_category')
                        <a href="" data-url="{{route('categories.delete',['id'=>$categories])}}" class="btn btn-danger action_delete">Xoá</a>
                        @endcan
                    </td>
                  </tr>

                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="col-md-12">
                {{$category->links()}}
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

    function Delete(event){
        event.preventDefault();
        let urlRequest = $(this).data('url');
        let that = $(this);
        Swal.fire({
        title: 'Bạn Chắc Không?',
        text: "Bạn muốn xoá nó?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Huỷ',
        confirmButtonText: 'Vâng, Xoá nó!'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: function(data){
                    if(data.code == 200){
                        that.parent().parent().remove(); //delete cot khi nhan button xoa
                        Swal.fire(
                            'Đã Xoá!',
                            'File của bạn đã được xoá.',
                            'Thành công'
                            )

                    }
                },
                error: function(){

                }
            });
        }
        })
    }

    $(function () {
        $(document).on('click','.action_delete', Delete);
    });
    </script>
@endsection
