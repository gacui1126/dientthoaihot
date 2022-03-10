@extends('master')

@section('css')
    <style>
        .btn-addtocart{
            margin-top: 70px;
            background-color: #4CAF50;
            color: rgb(26, 21, 21);
            border: none;
            padding: 10px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 20px;
            box-shadow: 3px 3px 3px 3px #a4b67a86;
            background: linear-gradient(to right, rgb(235, 217, 157), rgba(216, 136, 136, 0.945));
        }
        .btn-addtocart:hover {
            box-shadow: inset 0 -4px 0 0 rgba(0, 0, 0, 0.6), 0 0 8px 0 rgba(0, 0, 0, 0.5);
        }

    </style>
    <style type="text/css">
        .style_comment {
                border: 1px solid #ddd;
                border-radius: 10px;
                background: #ddd;
                color: #000;
            }
    </style>

@endsection

@section('content')

@if(Session::has('comment-err'))
    <div class="alert alert-danger">{{Session::get('comment-err')}}</div>
@endif

@if(Session::has('delete-comment-err'))
    <div class="alert alert-danger">{{Session::get('delete-comment-err')}}</div>
@endif

<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm {{$product->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('trang-chu')}}">Trang Chủ</a> / <span>{{$product->name}}</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">

                <div class="row">
                    <div class="col-sm-4">
                        <img src="{{$product->image_path}}" alt="" height="250px">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title">{{$product->name}}</p>
                            <p class="single-item-price">
                                <span>{{number_format($product->unit_price,0,'','.')}} vnd</span>
                            </p>
                        </div>

                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-desc">
                            <p>{{$product->description}}</p>
                        </div>
                        <div class="space20">&nbsp;</div>
                        <div class="space20">&nbsp;</div>
                        <div class="single-item-caption">
                            <a href="{{route('addtocart',$product->id)}}">
                                <button type="button" class="btn-addtocart">
                                    Đặt Hàng
                                </button>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                        {{-- <p>Options:</p>
                        <div class="single-item-options">
                            <select class="wc-select" name="size">
                                <option>Size</option>
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                            <select class="wc-select" name="color">
                                <option>Color</option>
                                <option value="Red">Red</option>
                                <option value="Green">Green</option>
                                <option value="Yellow">Yellow</option>
                                <option value="Black">Black</option>
                                <option value="White">White</option>
                            </select>
                            <select class="wc-select" name="color">
                                <option>Qty</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                            <div class="clearfix"></div>
                        </div> --}}
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-reviews">Đánh giá</a></li>
                        <li><a href="#tab-description">Mô tả</a></li>
                    </ul>

                    <div class="panel" id="tab-description">
                        <p>{{$product->description}}</p>
                    </div>
                    <div class="panel" id="tab-reviews">
                        <form action="#">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control comment_body" name="body"></textarea>
                                <input type="hidden" name="id_product" class="id_product" value="{{ $product->id }}" />
                            </div>

                            <div class="form-group">
                                <button type="button" class="btn btn-success send_comment" style="margin-left: 350px">Đăng</button>
                            </div>
                            <div id="notify_comment" style="color: rgb(149, 209, 142)"></div>
                        </form>


                        <form>
                            @csrf
                            <input type="hidden" name="id_product" class="id_product" value="{{ $product->id }}" />
                            <div id="show_comment">

                            </div>
                        </form>
                    </div>

                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Sản phẩm tương tự</h4>

                    <div class="row">
                        @foreach ($product_like as $Product_like)

                        <div class="col-sm-4">
                            <div class="single-item">
                                <div class="single-item-header">
                                    <a href="{{route('product',['id'=>$Product_like])}}"><img src="{{$Product_like->image_path}}" alt="" height="250px"></a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">{{$Product_like->name}}</p>
                                    <p class="single-item-price">
                                        <span>{{$Product_like->unit_price}}</span>
                                    </p>
                                </div>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="product.html">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div> <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">Best Sellers</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/1.png" alt=""></a>
                                <div class="media-body">
                                    Sample Woman Top
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/2.png" alt=""></a>
                                <div class="media-body">
                                    Sample Woman Top
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/3.png" alt=""></a>
                                <div class="media-body">
                                    Sample Woman Top
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/4.png" alt=""></a>
                                <div class="media-body">
                                    Sample Woman Top
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
                <div class="widget">
                    <h3 class="widget-title">New Products</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/1.png" alt=""></a>
                                <div class="media-body">
                                    Sample Woman Top
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/2.png" alt=""></a>
                                <div class="media-body">
                                    Sample Woman Top
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/3.png" alt=""></a>
                                <div class="media-body">
                                    Sample Woman Top
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/4.png" alt=""></a>
                                <div class="media-body">
                                    Sample Woman Top
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection


@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- <script>

    $(function () {
        $(document).on('click','.action_delete', Delete);
    });

    function Delete(event){
        event.preventDefault();
        let urlRequest = $(this).data('url');
        let that = $(this);
        Swal.fire({
        title: 'Bạn Chắc Không?',
        text: "Bạn muốn xoá Bình luận?",
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
                            'success'
                            )

                    }
                },
                error: function(){

                }
            });
        }
        })
    }


</script> --}}
<script type="text/javascript" >
    $(document).ready(function (){
        load_comment();
        function load_comment(){
            var id_product = $('.id_product').val();
            var _token = $('input[name="_token"]').val();
            var url = "{{url('comment/load-comment')}}";
            $.ajax({
                url: url,
                method:"POST",
                data:{id_product:id_product,_token:_token},
                success: function(data){
                    $('#show_comment').html(data);
                }
            });
        }
        $('.send_comment').click( function (){
            var id_product = $('.id_product').val();
            var comment_body = $('.comment_body').val();
            var _token = $('input[name="_token"]').val();
            var url = "{{url('comment/send-comment')}}";
            $.ajax({
                url: url,
                method:"POST",
                data:{id_product:id_product,comment_body:comment_body,_token:_token},
                success: function(data){
                    load_comment();
                    $('#notify_comment').html('<strong>Thêm bình luận thành công</strong>');
                    $('#notify_comment').fadeOut(1000);
                    $('.comment_body').val('');
                }
            });
        });
    });
</script>
{{-- <script type="text/javascript">
    $('.action_delete').click( function (){
        var id_comment = $('.id_comment').val();
        var _token = $('input[name="_token"]').val();
        var url = "{{url('comment/delete')}}";
        $.ajax({
                url: url,
                method:"POST",
                data:{id_comment:id_comment,_token:_token},
                success: function(data){
                    load_comment();
                }
            });
    });
</script> --}}
@endsection


