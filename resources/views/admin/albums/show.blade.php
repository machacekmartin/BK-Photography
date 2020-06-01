@extends('admin.index')

@section('admin_content')

Admin Show album
<hr>

<span>ID: {{ $album->id }}</span>
<form action="{{ route('admin.albums.update', $album->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="name">Name: </label>
    <input type="text" value="{{ $album->name }}" name="name">
    <br>
    <label for="category_id">Category: </label>
    <select name="category_id">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @if ($category->id == $album->category->id) selected @endif>{{ $category->name }}</option>
        @endforeach
    </select>
    <br>
    <label for="thumbnail">Thumbnail: </label>
    <p>{{ $album->thumbnail }}</p>
    <input type="file" name="thumbnail">

    <input type="submit" value="Update album">
</form>

<hr>

<p>Images: </p>
<pre>
    @foreach ($album->images as $image)
        <p> {{ $image->image }}</p>
    @endforeach
</pre>
<p>Upload images to this album</p>
<form action="{{ route('admin.images.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="images[]">
    <input type="submit" value="save">
</form>

<hr>

@endsection