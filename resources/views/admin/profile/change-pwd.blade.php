@extends('layouts.admin')
@section('title', 'User Chnage Password')
@section('content')
	<div class="col-sm-12">
		<form method="post" novalidate class="col-xs-6 col-xs-offset-3">
			{{csrf_field()}}
			<div class="form-group">
				<label for="oldPass">Password</label>
				<input id="oldPass" type="password" 
					 name="old_password" class="form-control" >
				@if (count($errors) > 0)
					<span class="text-danger">{{$errors->first('old_password')}}</span>
				@endif
				@if (Session::has('errMsg'))
				    <span class="text-danger">{{session('errMsg')}}</span>
				@endisset
			</div>
			<div class="form-group">
				<label for="newPass">New Password</label>
				<input type="password" name="new_password" id="newPass" class="form-control">
				@if (count($errors) > 0)
					<span class="text-danger">{{$errors->first('new_password')}}</span>
				@endif
			</div>
			<div class="form-group">
				<label for="confirmPass">Confirm Password</label>
				<input type="password" id="confirmPass" name="confirm_password" class="form-control">
				@if (count($errors) > 0)
					<span class="text-danger">{{$errors->first('confirm_password')}}</span>
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
	
@endsection