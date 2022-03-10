<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Điện thoại </title>
    <base href="{{asset('')}}">
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{asset("adminlte/plugins/fontawesome-free/css/all.min.css")}}">
	<link rel="stylesheet" href="{{asset("source/assets/dest/vendors/colorbox/example3/colorbox.css")}}">
	<link rel="stylesheet" href="{{asset("source/assets/dest/rs-plugin/css/settings.css")}}">
	<link rel="stylesheet" href="{{asset("source/assets/dest/rs-plugin/css/responsive.css")}}">
	<link rel="stylesheet" title="style" href="{{asset("source/assets/dest/css/style.css")}}">
	<link rel="stylesheet" href="{{asset("source/assets/dest/css/animate.css")}}">
    <link rel="stylesheet" title="style" href="{{asset("source/assets/dest/css/huong-style.css")}}">
    <link rel="stylesheet" href="{{asset("source/assets/dest/css/sweetalert.css")}}">
    <style>
        .media .media-body p{
            padding: 5px;
            color: #000;
            /* margin-top: 5px; */
        }
        .media img{
            border-radius: 10px 10px;
        }
        .media{
            padding: 10px;
            border-radius: 10px 10px;
            background: rgb(183, 199, 157);
        }
        #searchform #s{
            border-radius: 10px;
            background: rgb(165, 207, 193);
        }
        .cart{
            background: rgb(195, 218, 154);
            border-radius: 10px;
        }
        .cart:hover{
            background: rgb(230, 208, 208);
        }
        .header-bottom{
            background: linear-gradient(to right, rgb(200, 219, 156), rgba(216, 136, 136, 0.945));

        }
        .main-menu>ul.l-inline>li>a{
            color: #000;
        }
        .main-menu>ul.l-inline>li>a:hover{

            background: rgb(200, 219, 156);
        }
        .sub-menu li:hover{
            background: rgb(200, 219, 156);
        }
    </style>
    @yield('css')
</head>
<body>

    @include('header')
	<div class="rev-slider">
        @yield('content')
	</div>
    @include('footer')
	<!-- include js files -->
	<script src="{{asset("source/assets/dest/js/jquery.js")}}"></script>
	{{-- <script src="{{asset("source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js")}}"></script> --}}
	<script src="{{asset("http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js")}}"></script>
	<script src="{{asset("source/assets/dest/vendors/bxslider/jquery.bxslider.min.js")}}"></script>
	<script src="{{asset("source/assets/dest/vendors/colorbox/jquery.colorbox-min.js")}}""></script>
	<script src="{{asset("source/assets/dest/vendors/animo/Animo.js")}}"></script>
	<script src="{{asset("source/assets/dest/vendors/dug/dug.js")}}"></script>
	<script src="{{asset("source/assets/dest/js/scripts.min.js")}}"></script>
	<script src="{{asset("source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js")}}"></script>
	<script src="{{asset("source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js")}}"></script>
	<script src="{{asset("source/assets/dest/js/waypoints.min.js")}}"></script>
	<script src="{{asset("source/assets/dest/js/wow.min.js")}}"></script>
	<!--customjs-->
    <script src="{{asset("source/assets/dest/js/custom2.js")}}"></script>
    <script src="{{asset("source/assets/dest/js/sweetalert.js")}}"></script>

	<script>
	$(document).ready(function($) {
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
	})
    </script>

    @yield('js')
</body>
</html>
