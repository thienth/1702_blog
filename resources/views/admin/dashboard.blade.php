@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

<div class="box-body table-responsive no-padding">
  	<div class="col-lg-3 col-md-4 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>{{$cateCount}}</h3>
          <p>Categories</p>
        </div>
        <div class="icon">
          <i class="fa fa-list"></i>
        </div>
        <a href="{{route('cate.list')}}" class="small-box-footer">
          More info <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-md-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$postCount}}</h3>

              <p>Posts</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-word-o"></i>
            </div>
            <a href="{{route('post.list')}}" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
</div>
@endsection