@extends('layouts.admin')
@section('title', 'Category management')
@section('content')
	<h1>Category Management</h1>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Cate name</th>
				<th>Parent name</th>
				<th> 
					<a href="{{route('cate.create')}}" class="btn btn-xs btn-success">Create</a>
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($cates as $element)
				<tr>
					<td>{{++$loop->index}}</td>
					<td>{{$element->cate_name}}</td>
					<td>{{$element->getParentName()}}</td>
					<td>
						<a href="" class="btn btn-xs btn-info">Edit</a>
						<a href="{{route('cate.remove', ['id' => $element->id])}}" class="btn btn-xs btn-danger">Remove</a>
					</td>
				</tr>
			@endforeach
			
		</tbody>
	</table>

@endsection