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
		<div class="category-list">
			<a href="{{$cate->getSlug()}}"><h3>{{$cate->cate_name}}</h3></a>
			@foreach ($posts as $p)
				<div class="post-item col-md-4">
					<a href="{{$p->getSlug()}}" title="">{{$p->title}}</a>
					<div class="bg-success">
						<a href="{{$p->getSlug()}}" class="thumbnail" title="">
							<img src="{{$p->image}}" alt="">
						</a>
						{!!$p->short_desc!!}
					</div>
				</div>
			@endforeach
		</div>
		{{$posts->links()}}
		
	</div>
</body>
</html>