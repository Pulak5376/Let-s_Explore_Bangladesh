@extends('layouts.admin')

@section('title', 'All Reviews')
@section('header', 'All Reviews')

@section('content')
<style>
    .admin-table-container {
        background: #fff;
        padding: 2rem;
        border-radius: 16px;
        box-shadow: 0 6px 24px rgba(28,88,115,0.10);
        margin-bottom: 2rem;
    }
    .admin-table-title {
        margin-bottom: 1.5rem;
        color: #1c5873;
        font-size: 2rem;
        font-weight: 700;
        letter-spacing: 1px;
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
    .admin-table td.rating {
        color: #FFD700;
        font-size: 1.25rem;
        letter-spacing: 1px;
    }
    .admin-table td.name {
        font-weight: 600;
        color: #14445a;
    }
    .admin-table td.date {
        color: #6c757d;
        font-size: 0.98rem;
    }
    .admin-table-empty {
        text-align: center;
        padding: 2rem;
        color: #999;
        font-size: 1.1rem;
    }
    .star-filter-btn {
        background: #1c5873;
        color: #fff;
        border: none;
        padding: 10px 15px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 0.9rem;
        font-weight: 600;
        transition: background 0.3s, transform 0.2s;
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
    .delete-btn i {
        font-size: 1rem;
    }
</style>
<div class="admin-table-container">
    <h2 class="admin-table-title">All Reviews</h2>
    <div style="margin-bottom: 1.5rem; display: flex; gap: 0.7rem;">
         <button class="star-filter-btn" data-star="all">Show All</button>
        <button class="star-filter-btn" data-star="5">5 Star</button>
        <button class="star-filter-btn" data-star="4">4 Star</button>
        <button class="star-filter-btn" data-star="3">3 Star</button>
        <button class="star-filter-btn" data-star="2">2 Star</button>
        <button class="star-filter-btn" data-star="1">1 Star</button>
       
    </div>
    <table class="admin-table" id="reviewTable">
        <thead>
            <tr>
                <th>Serial No</th>
                <th>Name</th>
                <th>Rating</th>
                <th>Review</th>
                <th>Date</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody id="reviewTableBody">
            @forelse($reviews as $review)
            <tr data-rating="{{ $review->rating }}">
                <td>{{ $loop->iteration }}</td>
                <td class="name">{{ $review->name }}</td>
                <td class="rating">{!! str_repeat('&#9733;', $review->rating) !!}{!! str_repeat('&#9734;', 5 - $review->rating) !!}</td>
                <td>{{ $review->review }}</td>
                <td class="date">{{ $review->created_at->format('M d, Y') }}</td>
                <td>
                    <form action="{{ route('admin.review.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this review?');" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn"><i class="fas fa-trash"></i> Delete</button>
                    </form>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="admin-table-empty">No reviews found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

   
</div>
<script>
    const filterBtns = document.querySelectorAll('.star-filter-btn');
    const reviewRows = Array.from(document.querySelectorAll('#reviewTableBody tr[data-rating]'));
    const filteredNamesContainer = document.getElementById('filteredNamesContainer');
    const filteredNamesTitle = document.getElementById('filteredNamesTitle');
    const filteredNamesBody = document.getElementById('filteredNamesBody');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const star = btn.getAttribute('data-star');
            // Reset all rows
            reviewRows.forEach(row => row.style.display = (star === 'all' ? '' : (row.getAttribute('data-rating') === star ? '' : 'none')));

            // Show/hide filtered names table
            if (star !== 'all') {
                // Collect names for this star
                const filtered = reviewRows.filter(row => row.getAttribute('data-rating') === star);
                filteredNamesBody.innerHTML = '';
                filtered.forEach((row, idx) => {
                    const name = row.querySelector('.name').textContent;
                    filteredNamesBody.innerHTML += `<tr><td>${idx+1}</td><td>${name}</td></tr>`;
                });
                filteredNamesTitle.textContent = `${star} Star Reviewers`;
                filteredNamesContainer.style.display = filtered.length ? '' : 'none';
                if(filtered.length === 0) {
                    filteredNamesBody.innerHTML = `<tr><td colspan='2' style='text-align:center; color:#999;'>No reviewers found.</td></tr>`;
                }
            } else {
                filteredNamesContainer.style.display = 'none';
            }
        });
    });
</script>
@endsection