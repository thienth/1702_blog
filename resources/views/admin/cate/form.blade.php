@extends('layouts.admin')
@section('title', 'Category management')
@section('content')
	<div class="col-sm-6 col-sm-offset-3">
		<form action="" method="post" novalidate>
			<div class="form-group">
				<label for="cate-name">Category name</label>
				<input id="cate-name" type="text" value="{{$model->cate_name}}" name="cate_name" class="form-control" placeholder="Category name">
			</div>
			<div class="form-group">
				<label for="cate-parent">Parent</label>
				<select name="parent_id" class="form-control">
					
				</select>
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-success">Submit</button>
				<a href="{{route('cate.list')}}" class="btn btn-warning">Cancel</a>
			</div>
		</form>

	</div>

@endsection