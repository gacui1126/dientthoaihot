@extends('admin.admin')

@section('title')

<title>Danh mục sản phẩm</title>

@endsection

@section('content')

  <div class="content-wrapper">
    @include('admin.content-header',['name' => 'Bill' , 'key' => 'List'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
            @can('create_category')
            <div class="col-md-12">
                <a href="" class="btn btn-success float-right m-12">Thêm danh mục</a>
            </div>
            @endcan

            <div class="col-md-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Ngày đặt hàng</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Phương thức thanh toán</th>
                    <th scope="col">ghi chú</th>
                    <th scope="col">Chi tiết</th>
                  </tr>
                </thead>

                @foreach ($bill as $bills)
                <tbody>
                    <tr>
                        <th scope="row">{{$bills->id}}</th>
                        <td>{{$bills->customer->name}}</td>
                        <td>{{$bills->date_order}}</td>
                        <td>{{$bills->total}}</td>
                        <td>{{$bills->payment}}</td>
                        <td>{{$bills->note}}</td>
                        <td>
                            <a href="{{route('admin.bill.details',['id'=>$bills->id])}}" class="btn btn-success">Chi tiết</a>
                        </td>
                    </tr>
                  </tbody>
                @endforeach

              </table>
            </div>
            <div class="col-md-12">
                {{$bill->links()}}
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
@endsection
