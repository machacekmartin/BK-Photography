@extends('layouts.app')
@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf
    <label for="email">{{ __('E-Mail Address') }}</label>
    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    @error('email')
        <span role="alert">{{ $message }}</span>
    @enderror
    <br>

    <label for="password" >{{ __('Password') }}</label>
    <input id="password" type="password" name="password" required autocomplete="current-password">
    @error('password')
        <span role="alert">{{ $message }}</span> 
    @enderror
    <br>

    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    <label for="remember">{{ __('Remember Me') }}</label>
    <br>

    <button type="submit" >{{ __('Login') }}</button>
            
    @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    @endif
</form>
@endsection
