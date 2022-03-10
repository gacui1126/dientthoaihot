@extends('master')

@section('content')

<div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
        <div class="bannercontainer" >
        <div class="banner" >
                <ul>
                    @foreach ($slide as $Slide)
                    <!-- THE FIRST SLIDE -->
                    <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                    <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                    <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="{{$Slide->image_path}}" data-src="{{$Slide->image_path}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('{{$Slide->image_path}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                    </div>
                                </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="tp-bannertimer"></div>
    </div>
</div>
<!--slider-->
<div class="container">
<div id="content" class="space-top-none">
<div class="main-content">
<div class="space60">&nbsp;</div>
<div class="row">
    <div class="col-sm-12">
        <div class="beta-products-list">
            <h4 style="text-align: center;"><strong>Sản Phẩm Mới</strong></h4>
            <div style="border: 1px solid rgb(226, 225, 146); width: 30%;margin-left:400px;margin-bottom: 30px"></div>
            <div class="beta-products-details">
                <div class="clearfix"></div>
            </div>
            <div class="row">
                @foreach ($products as $Product)
                <div class="col-sm-3">
                    <div class="single-item">
                        <form>
                            @csrf
                            <input type="hidden" class="product_id_{{$Product->id}}" value="{{$Product->id}}">
                            <input type="hidden" class="product_name_{{$Product->id}}" value="{{$Product->name}}">
                            <input type="hidden" class="product_image_path_{{$Product->id}}" value="{{$Product->image_path}}">
                            <input type="hidden" class="product_unit_price_{{$Product->id}}" value="{{$Product->unit_price}}">
                            <input type="hidden" class="product_quantity_{{$Product->id}}" value="1">

                            <div class="single-item-header">
                                <a href="{{route('product',$Product->id)}}"><img src="{{$Product->image_path}}" alt="" height="250px"></a>
                            </div>
                                <div class="single-item-body" style="padding:5px 0">
                                <p class="single-item-title"><strong>{{$Product->name}}</strong></p>
                                    <p class="single-item-price">
                                    <span>{{number_format($Product->unit_price,0,'','.')}} vnd</span>
                                    </p>
                                </div>
                                <div class="single-item-caption">
                                    <button type="button" class="btn btn-primary add-to-cart1" data-id_product="{{$Product->id}}"><i class="fa fa-shopping-cart"></i></button>
                                    <a class="btn btn-warning beta-btn" href="{{route('product',$Product->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                        </form>

                    </div>
                </div>

                @endforeach
            </div>

        <div class="space50">&nbsp;</div>

        <div class="beta-products-list">
            <div  style="text-align: center;">
                <h4><strong>Sản Phẩm Bán Chạy</strong></h4>
            </div>
            <div style="border: 1px solid rgb(226, 225, 146); width: 30%;margin-left:400px;margin-bottom: 30px"></div>
            <div class="beta-products-details">
                {{-- <p class="pull-left">438 styles found</p> --}}
                <div class="clearfix"></div>
            </div>
            <div class="row">
                @foreach ($products_top as $Products_top)
                <div class="col-sm-3" style="margin-bottom: 10px;">
                    <div class="single-item">
                        <div class="single-item-header">
                        <a href="{{route('product',$Products_top->id)}}"><img src="{{$Products_top->image_path}}" alt="" height="250px"></a>
                        </div>
                        <div class="single-item-body" style="padding:5px 0">
                        <p class="single-item-title"><strong>{{$Products_top->name}}</strong></p>
                            <p class="single-item-price">
                                <span>{{number_format($Products_top->unit_price,0,',','.')}} vnd</span>
                            </p>
                        </div>
                        <div class="single-item-caption">
                            <button class="btn btn-primary add-to-cart1" data-id_product="{{$Product->id}}"><i class="fa fa-shopping-cart"></i></button>
                            <a class="btn btn-warning beta-btn primary" href="{{route('product',$Products_top->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="row" style="margin-left: 500px;">{{$products_top->links()}}</div>
            </div>
            <div class="space40">&nbsp;</div>
        </div>
    </div>
</div>


</div> <!-- .main-content -->
</div> <!-- #content -->
</div> <!-- .container -->
@endsection

@section('js')
    <script>
    $(document).ready(function (){
        $('.add-to-cart1').click( function(){
            var _token = $('input[name="_token"]').val();
            var id = $(this).data('id_product');
            var product_id = $('.product_id_' + id).val();
            var product_name = $('.product_name_' + id).val();
            var product_image_path = $('.product_image_path_' + id).val();
            var product_unit_price = $('.product_unit_price_' + id).val();
            var product_quantity = $('.product_qty_' + id).val();
            $.ajax({
                url: '{{url('/add-to-cart')}}',
                method: 'POST',
                data:{
                    id: product_id,
                    name: product_name,
                    image_path: product_image_path,
                    qty: product_quantity,
                    price: product_unit_price,
                    _token: _token,
                },
                success:function(data){
                    Swal.fire({
                        icon: 'success',
                        title: 'Đã thêm vào giỏ hàng',
                        showCancelButton: true,
                        cancelButtonText: "Xem tiếp",
                        showConfirmButton: false,
                        footer: '<a style="color:green;" href="/checkout">Đến thanh toán</a>'
                        })
                }
            });
        });
    });
</script>
@endsection
