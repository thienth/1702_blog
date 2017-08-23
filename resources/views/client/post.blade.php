<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>

	<div class="container">
		<h1>{{$post->title}}</h1>
		<h6><a href="{{$cate->getSlug()}}" title="">{{$cate->cate_name}}</a></h6>
		<div class="col-xs-12 post-short-desc">
			{!! $post->short_desc !!}
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<a href="javascript:;" class="thumbnail" title="">
					<img src="{{$post->image}}" alt="">
				</a>
			</div>
		</div>
		
		<div class="post-content">
			{!! $post->content !!}
		</div>
		<div class="text-right">
			<strong>{{$post->author}}</strong>
		</div>
		
	</div>
</body>
</html>