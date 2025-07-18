@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard-container">
    <h1>Welcome, {{ Auth::user()->name }}!</h1>
    <p>Your email: {{ Auth::user()->email }}</p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>

<style>
.dashboard-container {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    gap: 1rem;
    justify-content: center;
    align-items: center;
    background: linear-gradient(to right, #1e3c72, #2a5298);
    color: white;
}
button {
    padding: 10px 20px;
    border: none;
    background-color: #ff4d4d;
    color: white;
    border-radius: 5px;
    cursor: pointer;
}
</style>
@endsection
