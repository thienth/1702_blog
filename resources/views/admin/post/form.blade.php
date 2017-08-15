@extends('layouts.admin')
@section('title', 'Category management')
@section('content')
	<div class="col-sm-12">
		<form action="{{route('post.save')}}" method="post" novalidate enctype="multipart/form-data">
			{{csrf_field()}}
			<input type="hidden" name="id" value="{{old('id', $model->id)}}">
			<input type="hidden" name="entity_type" value="{{$modelSlug->entity_type}}">

			<div class="form-group">
				<label for="title">Title</label>
				<input id="title" type="text" 
					value="{{old('title', $model->title)}}" name="title" class="form-control" placeholder="Post title">
				@if (count($errors) > 0)
					<span class="text-danger">{{$errors->first('title')}}</span>
				@endif
			</div>
			<div class="form-group">
				<label for="slug-url">Slug Url</label>
				<input id="slug-url" type="text" 
					value="{{old('slug', $modelSlug->slug)}}" name="slug" class="form-control" placeholder="Slug url">
				@if (count($errors) > 0)
					<span class="text-danger">{{$errors->first('slug')}}</span>
				@endif
			</div>
			<div class="form-group">
				<label for="cate-parent">Category</label>
				<select name="cate_id" class="form-control">
					<option value="0">--------------</option>
					@foreach ($listCate as $key => $value)
						@php
							$key = str_replace("x", "", $key);
							$selected = $model->cate_id == $key ? "selected" : null;
						@endphp

						<option value="{{$key}}" {{$selected}}>{{$value}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="image">Image</label>
				<input type="file" name="upload_image" class="form-control">
			</div>
			<div class="form-group">
				<label for="author">Author</label>
				<input type="text" name="author" value="{{old('author', $model->author)}}" class="form-control">
				@if (count($errors) > 0)
					<span class="text-danger">{{$errors->first('author')}}</span>
				@endif
			</div>
			<div class="form-group">
				<label for="short_desc">Short Description</label>
				<textarea name="short_desc" class="form-control" id="short_desc" >
					{{old('short_desc', $model->short_desc)}}
				</textarea>
				@if (count($errors) > 0)
					<span class="text-danger">{{$errors->first('short_desc')}}</span>
				@endif
			</div>
			<div class="form-group">
				<label for="content">Content</label>
				<textarea name="content" class="form-control" id="content" >
					{{old('content', $model->content)}}
				</textarea>
				@if (count($errors) > 0)
					<span class="text-danger">{{$errors->first('content')}}</span>
				@endif
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-success">Submit</button>
				<a href="{{route('cate.list')}}" class="btn btn-warning">Cancel</a>
			</div>
		</form>

	</div>

@endsection
@section('js')
  <script>
    ckeditor('short_desc');
    ckeditor('content');
    $(document).ready(function(){
		$('#title').on('keyup change', function(){
			title = $(this).val();
			if(title == ""){
				$('#slug-url').val('');
				return false;
			}
			$.ajax({
				url: "{{ route('slug.generate') }}", 
				type: 'GET',
				data: {title: title},
				dataType: 'JSON',
				success: function(rp){
					console.log(rp);
					$('#slug-url').val(rp.data);
				}
			});
		})
	});	
</script>
@endsection