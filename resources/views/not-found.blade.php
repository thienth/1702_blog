<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
  	<link rel="stylesheet" href="{{asset('plugins/font-awesome/css/font-awesome.min.css')}}">
  	<style type="text/css" media="screen">
  		
  	</style>
</head>
<body>
	<div class="container text-center">
		<h3>Ops!</h3>
		<h3>404 Not Found</h3>
		<strong>Sorry, an error has occured, Requested page not found!</strong>
		<br>
		<a href="{{route('homepage')}}" class="btn btn-primary btn-sm">
			<i class="fa fa-home"></i> Back to homepage
		</a>
		<a href="{{route('homepage')}}" class="btn btn-warning btn-sm">
			<i class="fa fa-envelope"></i> Contact to support
		</a>

	</div>
	
</body>
</html>