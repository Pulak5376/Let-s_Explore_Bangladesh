@extends('layouts.admin')

@section('title', 'Add Place')
@section('content')
<div class="container" style="max-width:600px; margin:40px auto;">
	<h2>Add a New Place</h2>
	@if (session('success'))
		<div style="color:green;">{{ session('success') }}</div>
	@endif
	@if ($errors->any())
		<div style="color:red; margin-bottom:15px;">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<form method="POST" action="{{ route('admin.places.store') }}">
		@csrf
		<div>
			<label>Name:</label>
			<input type="text" name="name" class="form-control" required>
		</div>
		<div>
			<label>Location:</label>
			<input type="text" name="location" class="form-control" required>
		</div>
		<div>
			<label>Image URL:</label>
			<input type="text" name="image_path" class="form-control" required>
		</div>
		<div>
			<label>Description:</label>
			<textarea name="description" class="form-control"></textarea>
		</div>
		<div>
			<label>Price:</label>
			<input type="number" step="0.01" name="price" class="form-control" required>
		</div>
		<div>
			<label>Day:</label>
			<input type="text" name="day" class="form-control" required>
		</div>
		<div>
			<label>Person:</label>
			<input type="text" name="person" class="form-control" required>
		</div>
		<button type="submit" class="btn btn-primary" style="margin-top:15px;">Add Place</button>
	</form>
</div>
@endsection
