<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
	
	<link rel="stylesheet" type="text/css" href="{{asset('client-assets/font/font-awesome.min.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('client-assets/font/font.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('client-assets/css/bootstrap.min.css')}}" media="screen" />
	<link rel="stylesheet" type="text/css" href="{{asset('client-assets/css/style.css')}}" media="screen" />
	<link rel="stylesheet" type="text/css" href="{{asset('client-assets/css/responsive.css')}}" media="screen" />
	<link rel="stylesheet" type="text/css" href="{{asset('client-assets/css/jquery.bxslider.css')}}" media="screen" />
</head>
<body>
	
	<div class="body_wrapper">
	    <div class="center">
	        <div class="header_area">
	            <div class="logo floatleft">
	                <a href="#"><img src="images/logo.png" alt=""></a>
	            </div>
	            <div class="top_menu floatleft">
	                <ul>
	                    <li><a href="{{route('homepage')}}">Home</a></li>
	                    <li><a href="{{route('login')}}">Login</a></li>
	                </ul>
	            </div>
	            <div class="social_plus_search floatright">
	                <div class="social">
	                    <ul>
	                        <li>
	                            <a href="#" class="twitter"></a>
	                        </li>
	                        <li>
	                            <a href="#" class="facebook"></a>
	                        </li>
	                        <li>
	                            <a href="#" class="feed"></a>
	                        </li>
	                    </ul>
	                </div>
	                <div class="search">
	                    <form action="#" method="post" id="search_form">
	                        <input type="text" value="Search news" id="s">
	                        <input type="submit" id="searchform" value="search">
	                        <input type="hidden" value="post" name="post_type">
	                    </form>
	                </div>
	            </div>
	        </div>
	        <div class="main_menu_area">
	            <ul id="nav">
	            	@foreach ($menuItems as $e)
                    	<li>
                    		<a href="{{$e->getUrl()}}">{{$e->name}}</a>
                		</li>
                    @endforeach
	            </ul>
	            <select class="selectnav" id="selectnav1">
	            	@foreach ($menuItems as $e)
	            		<option value="{{$e->getUrl()}}">{{$e->name}}</option>
                    @endforeach
	            </select>
	        </div>
	        @section('slider')

	        @show
	        <div class="content_area">
	            @yield('content')
	        </div>
	        <div class="footer_top_area">
	            <div class="inner_footer_top"> <img src="images/add3.png" alt=""> </div>
	        </div>
	        <div class="footer_bottom_area">
	            <div class="footer_menu">
	                <ul id="f_menu">
	                    <li><a href="#">world news</a></li>
	                    <li><a href="#">sports</a></li>
	                    <li><a href="#">tech</a></li>
	                    <li><a href="#">business</a></li>
	                    <li><a href="#">Movies</a></li>
	                    <li><a href="#">entertainment</a></li>
	                    <li><a href="#">culture</a></li>
	                    <li><a href="#">Books</a></li>
	                    <li><a href="#">classifieds</a></li>
	                    <li><a href="#">blogs</a></li>
	                </ul>
	            </div>
	            <div class="copyright_text">
	                <p>Copyright © 2045 The News Reporter Inc. All rights reserved | Design by <a target="_blank" rel="nofollow" href="#">Rafi MD</a></p>
	                <p>Trade marks and images used in the design are the copyright of their respective owners and are used for demo purposes only.</p>
	            </div>
	        </div>
	    </div>
	</div>
	
	<script type="text/javascript" src="{{asset('client-assets/js/jquery-min.js')}}"></script> 
	<script type="text/javascript" src="{{asset('client-assets/js/bootstrap.min.js')}}"></script> 
	<script type="text/javascript" src="{{asset('client-assets/js/jquery.bxslider.js')}}"></script> 
	<script type="text/javascript" src="{{asset('client-assets/js/selectnav.min.js')}}"></script> 
	<script type="text/javascript">
	
	$('.bxslider').bxSlider({
	    mode: 'fade',
	    captions: true
	});
	</script>
</body>
</html>