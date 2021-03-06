@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('register') }}">
    @csrf

    <label for="name" >{{ __('Name') }}</label>
    <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

    @error('name')
        <span role="alert">{{ $message }}</span>
    @enderror
    <br>

    <label for="email">{{ __('E-Mail Address') }}</label>
    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">

    @error('email')
        <span role="alert">{{ $message }}</span>
    @enderror
    <br>

    <label for="password" >{{ __('Password') }}</label>
    <input id="password" type="password" name="password" required autocomplete="new-password">
    @error('password')
        <span role="alert">{{ $message }}</span>
    @enderror
    <br>

    <label for="password-confirm">{{ __('Confirm Password') }}</label>
    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
    <br>
    <button type="submit">
        {{ __('Register') }}
    </button>
    
</form>

@endsection
