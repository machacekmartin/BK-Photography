@extends('layouts.app')

@section('content')

@include('common.header')
<hr>

<p>HOME</p>
<a href="{{ route('admin') }}">Login</a>

<hr>
@include('common.footer')

@endsection
