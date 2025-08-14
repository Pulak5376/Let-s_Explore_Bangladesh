@extends('layouts.admin')

@section('title', 'View Buses')
@section('header', 'All Buses')

@section('content')
<table style="width:100%;border-collapse:collapse;background:#fff;box-shadow:0 2px 6px rgba(0,0,0,0.1);border-radius:10px;overflow:hidden;">
    <thead>
        <tr style="background:#1c5873;color:#fff;">
            <th style="padding:0.8rem;border:1px solid #ddd;">ID</th>
            <th style="padding:0.8rem;border:1px solid #ddd;">Operator</th>
            <th style="padding:0.8rem;border:1px solid #ddd;">From</th>
            <th style="padding:0.8rem;border:1px solid #ddd;">To</th>
            <th style="padding:0.8rem;border:1px solid #ddd;">Departure</th>
            <th style="padding:0.8rem;border:1px solid #ddd;">Price</th>
            <th style="padding:0.8rem;border:1px solid #ddd;">Seats</th>
        </tr>
    </thead>
    <tbody>
        @foreach($trains as $train)
        <tr>
            <td style="padding:0.5rem;border:1px solid #ddd;">{{ $train->id }}</td>
            <td style="padding:0.5rem;border:1px solid #ddd;">{{ $train->name }}</td>
            <td style="padding:0.5rem;border:1px solid #ddd;">{{ $train->route_from }}</td>
            <td style="padding:0.5rem;border:1px solid #ddd;">{{ $train->route_to }}</td>
            <td style="padding:0.5rem;border:1px solid #ddd;">{{ $train->departure_time }}</td>
            <td style="padding:0.5rem;border:1px solid #ddd;">{{ $train->price }}</td>
            <td style="padding:0.5rem;border:1px solid #ddd;">{{ $train->total_seats }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
    }
    th, td {
        padding: 0.8rem;
        text-align: left;
        border: 1px solid #ddd;
    }
    th {
        background-color: #1c5873;
        color: white;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

</style>