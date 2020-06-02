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
    <img src="{{ asset('storage/albums/album-'. $album->id.'/thumbnail/'.$album->thumbnail) }}" alt="Thumbnail">
    <input type="file" name="thumbnail">
    <br>
    <input type="submit" value="Update album">
</form>

<hr>

<p>Images: </p>
<pre>
    <div style="display: flex; flex-flow: row;">
        @foreach ($album->images as $image)
            <a href="{{ route('admin.images.destroy', $image->id) }}">Delete</a>
            <img src="{{ asset('storage/albums/album-'.$image->album_id.'/'.$image->image) }}" alt="">
        @endforeach
    </div>
</pre>
<p>Upload images to this album</p>
<form action="{{ route('admin.images.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image[]" multiple>
    <input type="hidden" value="{{ $album->id }}" name="album_id">
    <input type="submit" value="save">
</form>

<hr>

@endsection