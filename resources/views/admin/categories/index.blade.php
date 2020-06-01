@extends('admin.index')

@section('admin_content')

Admin Categories
<br>
<hr>
@foreach ($categories as $category)
    <form method="POST" action="{{ route('admin.categories.update', $category->id) }}">
        @csrf
        @method('PUT')
        <input type="text" value="{{ $category->name }}" name="name">
        <input type="submit" value="update">
    </form>
    <p>ID: {{ $category->id }}</p>
    <p>Created: {{ $category->created_at }}</p>
    <p>Updated: {{ $category->updated_at }}</p>
    <a href="{{ route('admin.categories.destroy', $category->id) }}">Delete</a>
    <hr>
@endforeach

<hr>
<form action="{{ route('admin.categories.store') }}" method="POST">
    @csrf
    <label for="name">Category name:</label>
    <input type="text" name="name">
    <input type="submit">
</form>
 
@endsection