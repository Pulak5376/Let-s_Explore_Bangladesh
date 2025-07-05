@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<section class="contact-section">
  <h1>Contact Us</h1>
  <p>Have questions, feedback, or want to book a package? Send us a message and we’ll get back to you shortly.</p>
  
  {{-- Optional: Show success or error messages --}}
  @if(session('success'))
    <div class="success-message">{{ session('success') }}</div>
  @endif

  @if($errors->any())
    <div class="error-message">
      @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
      @endforeach
    </div>
  @endif

  <form action="#" method="POST" class="contact-form">
    @csrf
    <input type="text" name="name" placeholder="Your Name" required />
    <input type="email" name="email" placeholder="Your Email" required />
    <input type="text" name="subject" placeholder="Subject" required />
    <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
    <button type="submit">Send Message</button>
  </form>
</section>
@endsection
