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
		@foreach ($cates as $c)
			<div class="category-list">
				<a href="{{$c->getSlug()}}"><h3>{{$c->cate_name}}</h3></a>
				@foreach ($c->getTopPost(6) as $p)
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
		@endforeach
		
	</div>
</body>
</html>