@extends('admin.index')

@section('admin_content')

Admin Albums
<br>
<hr>
@foreach ($albums as $album)
    <p>ID: {{ $album->id }}</p>
    <form action="{{ route('admin.albums.update', $album->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" value="{{ $album->name }}" name="name">
        <label for="category_id">Category:</label>
        <select name="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if ($category->id == $album->category->id) selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>
        <input type="submit" value="update">
    </form>
    <p>Category: {{ $album->category->name }}</p>
    <p>Created: {{ $album->created_at }}</p>
    <p>Updated: {{ $album->updated_at }}</p>
    <a href="{{ route('admin.albums.destroy', $album->id) }}">Delete</a>
    <hr>
@endforeach

<hr>
<form action="{{ route('admin.albums.store') }}" method="POST">
    @csrf
    <label for="name">album name:</label>
    <input type="text" name="name">
    <select name="category_id">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <input type="submit">
</form>
 
@endsection