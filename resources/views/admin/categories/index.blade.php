@extends('admin.index')

@section('admin_content')

Admin Categories
<br>
@foreach ($categories as $category)
    {{ $category }}
    <br>
    <a href="/admin/categories/{{ $category->id }}/destroy"> Delete </a>
    
@endforeach
 
@endsection