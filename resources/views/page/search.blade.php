@extends('master')
@section('content')

<div class="container">
    <div id="content" class="space-top-none">
    <div class="main-content">
    <div class="space60">&nbsp;</div>
    <div class="row">
        <div class="col-sm-12">
            <div class="beta-products-list">
                <h4>Từ khoá tìm kiếm : {{Session::get('key')}}</h4>
                <div class="beta-products-details">
                    {{-- <p class="pull-left">438 styles found</p> --}}
                    <div class="clearfix"></div>
                </div>
                <div class="row">
                    @foreach ($product as $Product)
                    <div class="col-sm-3">
                        <div class="single-item">
                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                            <div class="single-item-header">
                            <a href="{{route('product',$Product->id)}}"><img src="{{$Product->image_path}}" alt="" height="250px"></a>
                            </div>
                            <div class="single-item-body">
                            <p class="single-item-title">{{$Product->name}}</p>
                                <p class="single-item-price">
                                <span>{{number_format($Product->unit_price)}} vnd</span>
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
                    <div class="row" style="margin-left: 400px;">{{$product->links()}}</div>

                </div>

            <div class="space50">&nbsp;</div>
        </div>
    </div>
</div>
</div>
</div>

@endsection
