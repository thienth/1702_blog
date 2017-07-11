<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">

{{$age}}
<br>

<a href="{{route('homepage')}}" title="">Homepage</a>
@foreach ($listPost as $element)
	<div>{{$element->title}}</div>
@endforeach