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
            <h4>Sản Phẩm Mới</h4>
            <div class="beta-products-details">
                {{-- <p class="pull-left">438 styles found</p> --}}
                <div class="clearfix"></div>
            </div>
            <div class="row">
                @foreach ($products as $Product)
                <div class="col-sm-3">
                    <div class="single-item">
                        {{-- <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div> --}}
                        <div class="single-item-header">
                        <a href="{{route('product',$Product->id)}}"><img src="{{$Product->image_path}}" alt="" height="250px"></a>
                        </div>
                        <div class="single-item-body">
                        <p class="single-item-title">{{$Product->name}}</p>
                            <p class="single-item-price">
                            <span>{{number_format($Product->unit_price,0,'','.')}} vnd</span>
                            </p>
                        </div>
                        <div class="single-item-caption">
                            <a class="add-to-cart pull-left" href="{{route('addtocart',$Product->id)}}"><i class="fa fa-shopping-cart"></i></a>
                            <a class="beta-btn primary" href="{{route('product',$Product->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>

        <div class="space50">&nbsp;</div>

        <div class="beta-products-list">
            <h4>Sản Phẩm Bán Chạy</h4>
            <div class="beta-products-details">
                {{-- <p class="pull-left">438 styles found</p> --}}
                <div class="clearfix"></div>
            </div>
            <div class="row">
                @foreach ($products_top as $Products_top)
                <div class="col-sm-3">
                    <div class="single-item">
                        <div class="single-item-header">
                        <a href="{{route('product',$Products_top->id)}}"><img src="{{$Products_top->image_path}}" alt="" height="250px"></a>
                        </div>
                        <div class="single-item-body">
                        <p class="single-item-title">{{$Products_top->name}}</p>
                            <p class="single-item-price">
                                <span>{{number_format($Products_top->unit_price)}} vnd</span>
                            </p>
                        </div>
                        <div class="single-item-caption">
                            <a class="add-to-cart pull-left" href="{{route('addtocart',$Products_top->id)}}"><i class="fa fa-shopping-cart"></i></a>
                            <a class="beta-btn primary" href="{{route('product',$Products_top->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="row" style="margin-left: 400px;">{{$products_top->links()}}</div>
            </div>
            <div class="space40">&nbsp;</div>
        </div>
    </div>
</div>


</div> <!-- .main-content -->
</div> <!-- #content -->
</div> <!-- .container -->
@endsection
