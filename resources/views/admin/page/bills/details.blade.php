@extends('admin.admin')

@section('title')

<title>Chi tiết đơn hàng</title>

@endsection

@section('content')

  <div class="content-wrapper">
    @include('admin.content-header',['name' => 'Bill' , 'key' => 'Details'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">id bill</th>
                    <th scope="col">Id Sản phẩm</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá tiền</th>
                  </tr>
                </thead>

                @foreach ($bill_details as $bill_detail)
                <tbody>
                    <tr>
                        <th scope="row">{{$bill_detail->id}}</th>
                        <td>{{$bill_detail->id_bill}}</td>
                        <td>{{$bill_detail->id_product}}</td>
                        <td>{{$bill_detail->product->name}}</td>
                        <td>{{$bill_detail->quantity}}</td>
                        <td>{{$bill_detail->unit_price}}</td>
                    </tr>
                  </tbody>
                @endforeach
              </table>
            </div>
            <div class="col-md-12">

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
