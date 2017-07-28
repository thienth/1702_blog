@extends('layouts.admin')
@section('title', 'Category management')
@section('content')
@php
	$pageSizes = [20, 40, 60, 100];
	// $sortedArr = get_options($cates, 0, "");
	
@endphp
	<div class="col-sm-12">
		<form action="{{route('cate.list')}}" method="get" class="form-inline col-sm-10" >	
			<div class="form-group">
				<label for="">Page size</label>
				<select name="pageSize">
					@foreach ($pageSizes as $ps)
						@php
							$selectedPs = $ps == $ctlPageSize ? "selected" : "";
						@endphp
						<option {{$selectedPs}} value="{{$ps}}">{{$ps}}</option>
					@endforeach
				</select>
			</div>
			&nbsp;
			<div class="form-group">
				<label for="">Search</label>
				<input type="text" value="{{$keyword}}" class="form-control" name="keyword">
				<button type="submit" class="btn btn-sm btn-info">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			</div>
			
		</form>
	</div>
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
				@php
					// $element = get_in_array($key, $cates, "x");
					// $element->cate_name = $value;
				@endphp
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
			<tr>
				<td colspan="4" class="text-center">
					{{ $cates->links() }}
				</td>
			</tr>
			
		</tbody>
	</table>

@endsection



