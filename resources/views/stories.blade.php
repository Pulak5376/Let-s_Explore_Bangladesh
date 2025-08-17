@extends('layouts.app')

@section('title', 'Stories')

@section('content')

<!-- Styles Section -->
<style>
  /* ...existing code... */
  .story-upload-form {
    background: #f9fbfd;
    border-radius: 16px;
    box-shadow: 0 4px 16px rgba(28,88,115,0.10);
    padding: 18px 22px;
    margin-bottom: 36px;
    max-width: 400px;
    margin-left: auto;
    margin-right: auto;
    border: 1.5px solid #eaf3fa;
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  .story-upload-form h2 {
    margin-bottom: 14px;
    color: #31c214ff;
    font-size: 1.25rem;
    font-weight: 700;
    text-align: center;
    letter-spacing: 1px;
  }
  .story-upload-form label {
    font-weight: 600;
    color: #14445a;
    margin-bottom: 4px;
    display: block;
    width: 100%;
    text-align: left;
  }
  .story-upload-form input[type="text"],
  .story-upload-form input[type="file"],
  .story-upload-form textarea {
    width: 100%;
    padding: 8px 10px;
    border-radius: 6px;
    border: 1.2px solid #ced4da;
    margin-bottom: 14px;
    font-size: 0.98rem;
    background: #fff;
    transition: border-color 0.3s;
  }
  .story-upload-form textarea {
    min-height: 80px;
    resize: vertical;
  }
  .story-upload-form input[type="text"]:focus,
  .story-upload-form textarea:focus {
    outline: none;
    border-color: #1c5873;
    box-shadow: 0 0 4px rgba(28,88,115,0.10);
  }
  .story-upload-form button {
    width: 100%;
    background-color: #59d00eff;
    border: none;
    padding: 10px;
    color: white;
    font-weight: 600;
    font-size: 1rem;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s;
    margin-top: 4px;
  }
  .story-upload-form button:hover {
    background-color: #14445a;
    transform: translateY(-2px) scale(1.03);
  }
  .stories-container {
    max-width: 800px;
    margin: 40px auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    
  }
  .stories-container .title {
    font-size: 1.8rem;
    color: #64d40fff;
    margin-bottom: 24px;
    text-align: center;
  }
  .story-card {
    margin-left: auto;
    margin-right: auto;
  }
  .post-image {
    width: 100%;
    max-width: 700px;
    height: 400px;
    object-fit: cover;
    border-radius: 12px;
    margin-bottom: 10px;
    box-shadow: 0 2px 12px rgba(28,88,115,0.08);

  }
</style>

<div class="stories-container">
  <h1 class="title">Bangladesh Travel Stories</h1>

  <!-- Story Upload Form -->
  <form class="story-upload-form" action="{{ route('stories.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <h2>Share Your Story</h2>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="{{ old('title') }}" required>

    <label for="image">Upload Image</label>
    <input type="file" name="image" id="image" accept="image/*">

    <label for="content">Your Story</label>
    <textarea name="content" id="content" required>{{ old('content') }}</textarea>

    <button type="submit">Post Story</button>
  </form>

  <!-- Show Stories -->
  @if(isset($stories) && $stories->count())
    @foreach ($stories as $story)
      <div class="story-card">
        <!-- Post Header -->
        <div class="post-header">
          <div class="avatar">
            {{ $story->user && $story->user->name ? strtoupper(substr($story->user->name, 0, 2)) : '?' }}
          </div>
          <div class="post-info">
            <h3>{{ $story->user->name ?? 'Anonymous' }}</h3>
            <div class="post-time">{{ $story->created_at->diffForHumans() }}</div>
          </div>
        </div>

        <!-- Post Image -->
        @if($story->image)
          <img class="post-image" src="{{ asset('storage/' . $story->image) }}" alt="{{ $story->title }}">
        @endif

        <!-- Post Content -->
        <div class="post-content">
          <h4 style="margin:0 0 10px 0; color:#1c5873;">{{ $story->title }}</h4>
          <p class="post-text">{{ $story->content }}</p>
        </div>
      </div>
    @endforeach
  @else
    <p style="text-align:center; color:#888;">No stories yet. Be the first to share your experience!</p>
  @endif
</div>

@endsection
