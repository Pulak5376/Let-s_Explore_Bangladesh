@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<section class="contact-section">
  <h1>Contact Us</h1>
  <p>Have questions or want to book a package? Send us a message and we’ll get back to you shortly.</p>
  <form action="#" method="POST" class="contact-form">
    <input type="text" name="name" placeholder="Your Name" required />
    <input type="email" name="email" placeholder="Your Email" required />
    <input type="text" name="subject" placeholder="Subject" required />
    <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
    <button type="submit">Send Message</button>
  </form>
</section>
@endsection
