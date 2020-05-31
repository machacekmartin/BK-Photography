@extends('admin.index')

@section('admin_content')

Admin Images
<br>
@foreach ($images as $image)
    {{ $images }}
    <br>
@endforeach
 
@endsection