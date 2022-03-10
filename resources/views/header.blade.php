
<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href="{{route('contacts')}}"><i class="fa fa-home"></i> 388 Hà Huy Tập, Phường An Khê, Quận Thanh Khê, Thành Phố Đà Nẵng</a></li>
                    <li><a href=""><i class="fa fa-phone"></i> 034 318 3285</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    @if(Auth::check())
                        @if(Auth::user()->full_name == 'admin')
                        {{-- @if($na === 'admin' or $na === 'content' or $na ==='developer') --}}
                        <li><a class="btn btn-success" href="{{route('admin')}}"><i class="fa fa-user"></i>{{Auth::user()->full_name}}</a></li>
                        <li><a class="btn btn-danger" href="{{route('logout')}}"><i class="fas fa-sign-out-alt" style="font-size: 2em;"></i></i>Đăng xuất</a></li>
                        @else
                        <li>
                            <a class="btn btn-success" href="{{route('user.profile.index',['id'=>Auth::user()->id])}}"><i class="fa fa-user"></i>{{Auth::user()->full_name}}</a>
                        </li>
                        <li><a class="btn btn-danger" href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i></i>Đăng xuất</a></li>
                        @endif
                    @else
                    <li><a class="btn btn-success" href="{{route('page-signup')}}">Đăng kí</a></li>
                    <li><a class="btn btn-primary" href="{{route('pagelogin')}}">Đăng nhập</a></li>
                    @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
            <a href="{{route('trang-chu')}}" id="logo"><img src="source/assets/dest/images/logo.png" width="100px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov" style="margin-top: 20px">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="{{route('search')}}">
                        <input type="text" name="key" id="s" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>

                <div class="beta-comp">
                    <a href="checkout" style="text-decoration:none;color:black">
                        <div class="cart">
                            <div class="btn-checkout">
                                <i class="fa fa-shopping-cart"></i>
                                Giỏ hàng
                            </div>
                        </div>
                    </a>
                    {{-- @if(Session::has('cart'))
                    <div class="cart">
                        <div class="beta-select"><i class="fa fa-shopping-cart"></i>@if(Session::has('cart')) Giỏ hàng ({{Session('cart')->totalQty}}) @else Giỏ hàng (trống) @endif <i class="fa fa-chevron-down"></i></div>
                        <div class="beta-dropdown cart-body">
                            @foreach ($product_cart as $Product_cart)
                            <div class="cart-item">
                                <a class="cart-item-delete" href="{{route('deletecart',$Product_cart['item']['id'])}}"><i class="fa fa-times"></i></a>
                                <div class="media">
                                    <a class="pull-left" href="#"><img src="{{$Product_cart['item']['image_path']}}" alt=""></a>
                                    <div class="media-body">
                                        <span class="cart-item-title">{{$Product_cart['item']['name']}}</span>
                                        <div class="space10">&nbsp;</div>
                                        <div class="space10">&nbsp;</div>
                                        <span class="cart-item-amount">{{$Product_cart['qty']}}*<span>{{$Product_cart['item']['unit_price']}}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="cart-caption">
                                <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{Session('cart')->totalPrice}}</span></div>
                                <div class="clearfix"></div>

                                <div class="center">
                                    <div class="space10">&nbsp;</div>
                                    <a href="{{route('checkout')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .cart -->
                    @endif --}}
                </div>



            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                <li><a href="{{route('trang-chu')}}" style="background-color: #8e8f63;">Trang chủ</a></li>
                <li><a href="{{route('type.all')}}">Danh mục</a>
                        <ul class="sub-menu">
                            @foreach($product_type as $Product_type)
                            <li><a href="{{ route('product_type' , $Product_type->id) }}">{{$Product_type->name}}</a></li>
                            @endforeach
                        </ul>
                </li>
                <li><a href="{{route('about')}}">Giới thiệu</a></li>
                <li><a href="{{route('contacts')}}">Liên hệ</a></li>
                <div class="clearfix"></div>

            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->

    <script src="{{asset("source/assets/dest/js/jquery.js")}}"></script>
	<script src="{{asset("source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js")}}"></script>
    <script src="{{asset("source/assets/dest/js/sweetalert.js")}}"></script>
<script>


</script>

