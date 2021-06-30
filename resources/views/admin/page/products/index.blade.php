@extends('admin.admin')

@section('title')

<title>Thêm Sản Phẩm</title>

@endsection

@section('content')

  <div class="content-wrapper">
    @include('admin.content-header',['name' => 'Product' , 'key' => 'List'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @can('create_product')
                <a href="{{route('product.create')}}" class="btn btn-success float-right m-12">Thêm sản phẩm</a>
                @endcan
            </div>

            <div class="col-md-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Tên Sản phẩm</th>
                    <th scope="col">Mã sản phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Nội dung</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Tuỳ biến</th>
                  </tr>
                </thead>

                @foreach ($product_list as $list)
                <tbody>
                  <tr>
                    <td scope="row">{{$list->id}}</td>
                    <td>{{$list->name}}</td>
                    <td>{{$list->product_code}}</td>
                    <td>{{number_format($list->unit_price, 0,' ','.')}}</td>
                    <td>{{$list->description}}</td>
                    <td>
                        <image src="{{$list->image_path}}" height="100px"></image>
                    </td>
                    <td>
                        @can('update_product')
                        <a href="{{route('product.edit',['id'=>$list->id])}}" class="btn btn-success">Sửa</a>
                        @endcan
                        @can('delete_product')
                        <a href="" data-url="{{route('product.delete',['id'=>$list->id])}}" class="btn btn-danger action_delete">Xoá</a>
                        @endcan
                    </td>
                  </tr>
                </tbody>

                @endforeach
              </table>
            </div>

            <div class="col-md-12">
                {{$product_list->links()}}
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

    function actionDelete(event){
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
                        'Đã xoá!',
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
        $(document).on('click','.action_delete', actionDelete);
    });
    </script>
@endsection
