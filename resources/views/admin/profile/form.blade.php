@extends('layouts.admin')
@section('title', 'User profile')
@section('content')
	<div class="col-sm-12">
		<form method="post" novalidate enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="form-group">
				<label for="fullname">Full name</label>
				<input id="fullname" type="text" 
					value="{{old('full_name', $userInfo->full_name)}}" name="full_name" class="form-control" placeholder="Ex: Nguyen Van A">
				@if (count($errors) > 0)
					<span class="text-danger">{{$errors->first('full_name')}}</span>
				@endif
			</div>
			<div class="form-group">
				<label for="avatar">Avatar</label>
				<input type="file" name="avatar" id="avatar" class="form-control">
				@if (count($errors) > 0)
					<span class="text-danger">{{$errors->first('avatar')}}</span>
				@endif
			</div>
			<div class="form-group">
				<label for="birthDate">Birth date</label>
				<input type="text" id="birthDate" name="bith_date" value="{{old('birth_date', $userInfo->birth_date)}}" class="form-control">
				@if (count($errors) > 0)
					<span class="text-danger">{{$errors->first('bith_date')}}</span>
				@endif
			</div>
			<div class="form-group">
				<label for="fb">Facebook</label>
				<input type="text" id="fb" name="facebook" value="{{old('facebook', $userInfo->facebook)}}" class="form-control">
				@if (count($errors) > 0)
					<span class="text-danger">{{$errors->first('facebook')}}</span>
				@endif
			</div>
			<div class="form-group">
				<label for="web">Website</label>
				<input type="text" id="web" name="website" value="{{old('website', $userInfo->website)}}" class="form-control">
				@if (count($errors) > 0)
					<span class="text-danger">{{$errors->first('website')}}</span>
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
    	$('#birthDate').datepicker({
    		autoclose: true,
    		format: 'yyyy-mm-dd'
		});
	</script>
@endsection