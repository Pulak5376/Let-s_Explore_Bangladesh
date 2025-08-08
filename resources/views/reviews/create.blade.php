@extends('layouts.app')

@section('title', 'Reviews')

@section('content')
<style>
  /* Container */
  .container {
    max-width: 700px;
    margin: 40px auto;
    background: #fff;
    border-radius: 10px;
    padding: 30px 35px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  /* Heading */
  h2 {
    text-align: center;
    color: #007bff;
    margin-bottom: 20px;
    font-weight: 600;
  }

  /* Star rating container */
  .rating-stars {
    text-align: center;
    font-size: 28px;
    color: #ccc;
    margin-bottom: 20px;
    user-select: none;
  }
  .rating-stars .selected {
    color: #FFD700;
  }

  /* Textarea */
  textarea {
    width: 100%;
    padding: 12px 15px;
    font-size: 1rem;
    border-radius: 6px;
    border: 1.5px solid #ced4da;
    resize: vertical;
    min-height: 110px;
    margin-bottom: 20px;
    transition: border-color 0.3s;
  }
  textarea:focus {
    outline: none;
    border-color: #007bff;
    box-shadow: 0 0 6px rgba(0,123,255,0.4);
  }

  /* Input name */
  input[type="text"] {
    width: 100%;
    padding: 12px 15px;
    font-size: 1rem;
    border-radius: 6px;
    border: 1.5px solid #ced4da;
    margin-bottom: 15px;
    transition: border-color 0.3s;
  }
  input[type="text"]:focus {
    outline: none;
    border-color: #007bff;
    box-shadow: 0 0 6px rgba(0,123,255,0.4);
  }

  /* Submit button */
  button {
    width: 100%;
    background-color: #007bff;
    border: none;
    padding: 12px;
    color: white;
    font-weight: 600;
    font-size: 1.1rem;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  button:hover {
    background-color: #0056b3;
  }

  /* Reviews section */
  .reviews {
    margin-top: 40px;
  }

  /* Single review card */
  .review {
    display: flex;
    gap: 15px;
    background: #f8f9fa;
    border-radius: 10px;
    padding: 15px 20px;
    margin-bottom: 20px;
    box-shadow: 0 3px 12px rgba(0,0,0,0.05);
  }

  /* Avatar circle with initial */
  .avatar {
    min-width: 50px;
    min-height: 50px;
    background-color: #007bff;
    color: white;
    font-weight: 700;
    font-size: 22px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    text-transform: uppercase;
  }

  /* Review content */
  .review-content {
    flex: 1;
  }

  .review-header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 6px;
  }

  .review-name {
    font-weight: 600;
    font-size: 1.1rem;
    color: #343a40;
  }

  .review-date {
    font-size: 0.85rem;
    color: #6c757d;
  }

  /* Star rating for review */
  .review-rating {
    color: #FFD700;
    font-size: 1.3rem;
    margin-bottom: 8px;
  }

  /* Review text */
  .review p {
    margin: 0;
    font-size: 1rem;
    color: #495057;
    line-height: 1.5;
  }
</style>

<div class="container">
  <h2>Leave a Review</h2>

  {{-- Success message --}}
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  {{-- Validation errors --}}
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('reviews.store') }}" method="POST">
    @csrf

    <input 
      type="text" 
      name="name" 
      placeholder="Your Name" 
      value="{{ old('name') }}" 
      required>

    <div class="rating-stars" id="starRating">
      @for ($i = 1; $i <= 5; $i++)
        <span class="star" data-value="{{ $i }}">&#9733;</span>
      @endfor
    </div>
    <input type="hidden" name="rating" id="ratingValue" value="{{ old('rating', 0) }}" required>

    <textarea 
      name="review" 
      placeholder="Share your experience with this place..." 
      required>{{ old('review') }}</textarea>

    <button type="submit">Submit Review</button>
  </form>

  <div class="reviews">
    <h3>All Reviews</h3>

    @if(isset($reviews) && $reviews->count() > 0)
      @foreach($reviews as $review)
        <div class="review">
          <div class="avatar">{{ strtoupper(substr($review->name, 0, 1)) }}</div>
          <div class="review-content">
            <div class="review-header">
              <div class="review-name">{{ $review->name }}</div>
              <div class="review-date">{{ $review->created_at->format('F d, Y') }}</div>
            </div>
            <div class="review-rating">
              {!! str_repeat('&#9733;', $review->rating) !!}
              {!! str_repeat('&#9734;', 5 - $review->rating) !!}
            </div>
            <p>{{ $review->review }}</p>
          </div>
        </div>
      @endforeach
    @else
      <p>No reviews yet.</p>
    @endif
  </div>
</div>

<script>
  // Star rating interaction script
  const stars = document.querySelectorAll('.star');
  const ratingInput = document.getElementById('ratingValue');

  stars.forEach((star, idx) => {
    star.addEventListener('click', () => {
      ratingInput.value = star.getAttribute('data-value');
      stars.forEach((s, i) => {
        s.classList.toggle('selected', i < ratingInput.value);
      });
    });

    star.addEventListener('mouseover', () => {
      stars.forEach((s, i) => {
        s.classList.toggle('selected', i <= idx);
      });
    });

    star.addEventListener('mouseout', () => {
      const val = ratingInput.value;
      stars.forEach((s, i) => {
        s.classList.toggle('selected', i < val);
      });
    });
  });

  // Initialize stars on page load
  window.addEventListener('DOMContentLoaded', () => {
    const val = ratingInput.value;
    stars.forEach((s, i) => {
      s.classList.toggle('selected', i < val);
    });
  });
</script>
@endsection
