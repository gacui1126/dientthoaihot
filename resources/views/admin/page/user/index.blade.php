@extends('admin.admin')

@section('title')

<title>Trang User</title>

@endsection

@section('content')

  <div class="content-wrapper">
    @include('admin.content-header',['name' => 'User' , 'key' => 'List'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('users.create')}}" class="btn btn-success float-right m-12">Thêm User</a>
            </div>

            <div class="col-md-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Emai</th>
                    <th scope="col">Số đt</th>
                    <th scope="col">Tuỳ biến</th>
                  </tr>
                </thead>

                @foreach ($user as $users)
                <tbody>
                  <tr>
                    <td scope="row" class="col-3 align-self-center">{{$users->id}}</td>
                    <td scope="row">{{$users->full_name}}</td>
                    <td scope="row">{{$users->email}}</td>
                    <td scope="row">{{$users->phone}}</td>
                    <td>
                        @can('update_user')
                        <a href="{{route('users.edit',['id'=>$users->id])}}" class="btn btn-success">Sửa</a>

                        @endcan

                        @can('delete_user')
                        <a href="" data-url="{{route('users.delete',['id'=>$users->id])}}" class="btn btn-danger action_delete">Xoá</a>
                        @endcan
                    </td>
                  </tr>


                </tbody>
                @endforeach

              </table>
            </div>

            <div class="col-md-12">
                {{ $user->links() }}
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
