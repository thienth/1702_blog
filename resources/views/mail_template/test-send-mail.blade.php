<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Cate name</th>
			</tr>
		</thead>
		<tbody>
		@foreach ($cates as $c)
			<tr>
				<td>{{$c->id}}</td>
				<td>{{$c->cate_name}}</td>
			</tr>
		@endforeach
			
		</tbody>
	</table>
</body>
</html>