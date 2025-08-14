@extends('layouts.admin')

@section('title', 'Edit Transport')
@section('header', 'Edit Transport')

@section('content')
<form action="{{ route('admin.transports.update', $transport->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Name:</label>
    <input type="text" name="name" value="{{ $transport->name }}"><br><br>

    <label>Route From:</label>
    <input type="text" name="route_from" value="{{ $transport->route_from }}"><br><br>

    <label>Route To:</label>
    <input type="text" name="route_to" value="{{ $transport->route_to }}"><br><br>


    <label>Departure Time:</label>
    <input type="time" name="departure_time" value="{{ $transport->departure_time }}"><br><br>

    <label>Price:</label>
    <input type="number" name="price" value="{{ $transport->price }}" required><br><br>

    <label>Total Seats:</label>
    <input type="number" name="total_seats" value="{{ $transport->total_seats }}" required><br><br>

    <button type="submit">Update</button>
</form>
@endsection
<style>
    form {
        max-width: 600px;
        margin: 2rem auto;
        padding: 2rem;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 24px rgba(28, 88, 115, 0.10);
    }
    label {
        display: block;
        margin-bottom: 0.5rem;
    }
    input {
        width: calc(100% - 1rem);
        padding: 0.5rem;
        margin-bottom: 1rem;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    button {
        padding: 0.5rem 1rem;
        background-color: #1c5873;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    button:hover {
        background-color: #155a74;
    }
    body {
        background-color: #f4f4f4;
        font-family: Arial, sans-serif;
    }
    @media (min-width: 768px) {
        form {
            max-width: 800px;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
    }
</style>
