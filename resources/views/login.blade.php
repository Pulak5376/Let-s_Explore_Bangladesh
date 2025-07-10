@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="login-container">
  <h1>Login to Your Account</h1>

  <form method="POST" action="{{ route('login') }}">
    @csrf

    <label for="email">Email</label>
    <input
      type="email"
      id="email"
      name="email"
      value="{{ old('email') }}"
      required
      autofocus
      autocomplete="email"
      placeholder="you@example.com"
    />
    @error('email')
      <p class="error-message">{{ $message }}</p>
    @enderror

    <label for="password">Password</label>
    <input
      type="password"
      id="password"
      name="password"
      required
      autocomplete="current-password"
      placeholder="Your password"
    />
    @error('password')
      <p class="error-message">{{ $message }}</p>
    @enderror

    <button type="submit">Login</button>
  </form>

  <p class="signup-link">
    Don't have an account?
    <a href="{{ route('register') }}">Sign up here</a>
  </p>
</div>
@endsection
