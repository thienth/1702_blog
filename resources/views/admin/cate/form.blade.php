@extends('layouts.admin')
@section('title', 'Category management')
@section('content')
	<div class="col-sm-6 col-sm-offset-3">
		<form action="{{route('cate.save')}}" method="post" novalidate>
			{{csrf_field()}}
			<input type="hidden" name="id" value="{{$model->id}}">
			<div class="form-group">
				<label for="cate-name">Category name</label>
				<input id="cate-name" type="text" value="{{$model->cate_name}}" name="cate_name" class="form-control" placeholder="Category name">
			</div>
			<div class="form-group">
				<label for="cate-parent">Parent</label>
				<select name="parent_id" class="form-control">
					@foreach ($listCate as $element)
						@php
							$selected = $model->parent_id == $element->id ? "selected" : null;
						@endphp

						<option value="{{$element->id}}" {{$selected}}>{{$element->cate_name}}</option>
					@endforeach
				</select>
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-success">Submit</button>
				<a href="{{route('cate.list')}}" class="btn btn-warning">Cancel</a>
			</div>
		</form>

	</div>

@endsection