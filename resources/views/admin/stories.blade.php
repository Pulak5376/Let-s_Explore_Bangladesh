@extends('layouts.admin')

@section('title', 'All Stories')
@section('header', 'All Stories')

@section('content')
<style>
	.admin-table-container {
		background: #fff;
		padding: 2rem;
		border-radius: 16px;
		box-shadow: 0 6px 24px rgba(28,88,115,0.10);
		margin-bottom: 2rem;
	}
	.admin-table {
		width: 100%;
		border-collapse: separate;
		border-spacing: 0;
		background: #f9fbfd;
		border-radius: 12px;
		overflow: hidden;
		box-shadow: 0 2px 8px rgba(28,88,115,0.04);
	}
	.admin-table th, .admin-table td {
		padding: 14px 18px;
		text-align: left;
	}
	.admin-table th {
		background: #eaf3fa;
		color: #1c5873;
		font-size: 1.05rem;
		font-weight: 600;
		border-bottom: 2px solid #dbeafe;
	}
	.admin-table tbody tr {
		transition: background 0.2s;
	}
	.admin-table tbody tr:hover {
		background: #eaf3fa;
	}
	.admin-table td {
		border-bottom: 1px solid #e5e7eb;
		font-size: 1rem;
		vertical-align: middle;
	}
	.admin-table td img {
		max-width: 120px;
		max-height: 80px;
		border-radius: 8px;
		box-shadow: 0 1px 4px rgba(28,88,115,0.08);
	}
	.delete-btn {
		background: #e74c3c;
		color: #fff;
		border: none;
		padding: 7px 16px;
		border-radius: 6px;
		font-size: 0.95rem;
		font-weight: 600;
		cursor: pointer;
		display: flex;
		align-items: center;
		gap: 6px;
		box-shadow: 0 2px 6px rgba(231,76,60,0.08);
		transition: background 0.2s, transform 0.15s;
	}
	.delete-btn:hover {
		background: #c0392b;
		transform: translateY(-2px) scale(1.04);
	}
</style>
<div class="admin-table-container">
	<h2 style="color:#1c5873; margin-bottom:1.5rem;">All Stories</h2>
	<table class="admin-table">
		<thead>
			<tr>
				<th>ID</th>
				<th>User</th>
				<th>Title</th>
				<th>Image</th>
				<th>Content</th>
				<th>Date</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			@forelse($stories as $story)
			<tr>
				<td>{{ $story->id }}</td>
				<td>{{ $story->user->name ?? 'Anonymous' }}</td>
				<td>{{ $story->title }}</td>
				<td>
					@if($story->image)
						<img src="{{ asset('storage/' . $story->image) }}" alt="Story Image">
					@else
						<span style="color:#aaa;">No Image</span>
					@endif
				</td>
				<td style="max-width:300px; white-space:pre-line; overflow:hidden; text-overflow:ellipsis;">{{ Str::limit($story->content, 120) }}</td>
				<td>{{ $story->created_at->format('M d, Y') }}</td>
				<td>
					<form action="{{ route('admin.stories.destroy', $story->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this story?');" style="display:inline;">
						@csrf
						@method('DELETE')
						<button type="submit" class="delete-btn"><i class="fas fa-trash"></i> Delete</button>
					</form>
				</td>
			</tr>
			@empty
			<tr>
				<td colspan="7" style="text-align:center; color:#999;">No stories found.</td>
			</tr>
			@endforelse
		</tbody>
	</table>
</div>
@endsection
