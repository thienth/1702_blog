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

				</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($cates as $element)
				<tr>
					<td></td>
					<td>{{$element->name}}</td>
					<td>{{$element->parent_id}}</td>
					<td>
						
					</td>
				</tr>
			@endforeach
			
		</tbody>
	</table>

@endsection