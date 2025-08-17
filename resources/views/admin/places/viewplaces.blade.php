@extends('layouts.admin')

@section('title', 'View Places')
@section('content')
<div class="container" style="max-width:900px; margin:40px auto;">
	<h2>All Places</h2>
	@if(session('success'))
		<div style="color:green;">{{ session('success') }}</div>
	@endif
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Location</th>
				<th>Image</th>
				<th>Description</th>
				<th>Price</th>
				<th>Day</th>
				<th>Person</th>
			</tr>
		</thead>
		<tbody>
			@foreach($places as $place)
				<tr>
					<td>{{ $place->id }}</td>
					<td>{{ $place->name }}</td>
					<td>{{ $place->location }}</td>
					<td><img src="{{ $place->image_path }}" alt="{{ $place->name }}" style="width:80px;"></td>
					<td>{{ $place->description }}</td>
					<td>{{ $place->price }}</td>
					<td>{{ $place->day }}</td>
					<td>{{ $place->person }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection
