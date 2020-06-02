@extends('layouts.app')

@section('content')

<ul>
    <li>
        <a href="{{ route('admin') }}">Overview</a>
    </li>
    <li>
        <a href="{{ route('admin.categories') }}">Categories</a>
    </li>
    <li>
        <a href="{{ route('admin.albums') }}">Albums</a>
    </li>
    <li>
        <a href="{{ route('admin.images') }}">Images</a>
    </li>
</ul>

@yield('admin_content')


<a class="dropdown-item" href="{{ route('logout') }}"
    onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
@endsection