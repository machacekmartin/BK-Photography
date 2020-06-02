@extends('admin.index')

@section('admin_content')

Admin Images
<br>

<div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr; grid-gap: 20px;">
@foreach ($images as $image)
    <div style="position: relative">
        <a style="position: absolute; top: 0; left: 0;" href="{{ route('admin.images.destroy', $image->id) }}">X</a>
        <img src="{{ asset('storage/albums/album-'. $image->album_id. '/'.$image->image) }}" alt="">
    </div>
    
@endforeach
</div>
 
@endsection