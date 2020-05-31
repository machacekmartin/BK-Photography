@extends('admin.index')

@section('admin_content')

Admin Albums
<br>
@foreach ($albums as $album)
    {{ $albums }}
    <br>
@endforeach
 
@endsection