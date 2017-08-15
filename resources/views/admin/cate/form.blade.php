@extends('layouts.admin')
@section('title', 'Category management')
@section('content')
	<div class="col-sm-6 col-sm-offset-3">
		<form action="{{route('cate.save')}}" method="post" novalidate>
			{{csrf_field()}}
			<input type="hidden" name="id" value="{{$model->id}}">
			<input type="hidden" name="entity_type" value="{{$modelSlug->entity_type}}">
			<div class="form-group">
				<label for="cate-name">Category name</label>
				<input id="cate-name" type="text" 
					value="{{old('cate_name', $model->cate_name)}}" name="cate_name" class="form-control" placeholder="Category name">
				@if (count($errors) > 0)
					<span class="text-danger">{{$errors->first('cate_name')}}</span>
				@endif
			</div>
			<div class="form-group">
				<label for="cate-url">Slug Url</label>
				<input id="cate-url" type="text" 
					value="{{old('slug', $modelSlug->slug)}}" name="slug" class="form-control" placeholder="Slug url">
				@if (count($errors) > 0)
					<span class="text-danger">{{$errors->first('slug')}}</span>
				@endif
			</div>
			<div class="form-group">
				<label for="cate-parent">Parent</label>
				<select name="parent_id" class="form-control">
					<option value="0">--------------</option>
					@foreach ($listCate as $key => $value)
						@php
							$key = str_replace("x", "", $key);
							$selected = $model->parent_id == $key ? "selected" : null;
						@endphp

						<option value="{{$key}}" {{$selected}}>{{$value}}</option>
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
@section('js')
	<script type="text/javascript">
		$(document).ready(function(){
			$('#cate-name').on('keyup change', function(){
				title = $(this).val();
				if(title == ""){
					$('#cate-url').val('');
					return false;
				}
				$.ajax({
					url: "{{ route('slug.generate') }}", 
					type: 'GET',
					data: {title: title},
					dataType: 'JSON',
					success: function(rp){
						console.log(rp);
						$('#cate-url').val(rp.data);
					}
				});
			})
		});
	</script>
@endsection