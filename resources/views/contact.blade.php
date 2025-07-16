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

<style>
  .contact-section {
    max-width: 600px;
    margin: 40px auto;
    padding: 40px;
    background: linear-gradient(135deg, #f1f8e9 0%, #e8f5e8 100%);
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(46, 125, 50, 0.15);
    border: 2px solid rgba(102, 187, 106, 0.2);
  }

  .contact-section h1 {
    color: #2e7d32;
    text-align: center;
    margin-bottom: 20px;
    font-size: 2.5rem;
  }

  .contact-section p {
    color: #388e3c;
    text-align: center;
    margin-bottom: 30px;
    font-size: 1.1rem;
  }

  .success-message {
    background: linear-gradient(135deg, #4caf50, #388e3c);
    color: white;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 20px;
    text-align: center;
  }

  .error-message {
    background: linear-gradient(135deg, #f44336, #d32f2f);
    color: white;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 20px;
  }

  .contact-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
  }

  .contact-form input,
  .contact-form textarea {
    padding: 15px;
    border: 2px solid #66bb6a;
    border-radius: 10px;
    font-size: 1rem;
    background: rgba(255, 255, 255, 0.9);
    transition: all 0.3s ease;
  }

  .contact-form input:focus,
  .contact-form textarea:focus {
    outline: none;
    border-color: #4caf50;
    box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
  }

  .contact-form button {
    padding: 15px;
    background: linear-gradient(135deg, #4caf50, #388e3c);
    color: white;
    border: 2px solid #66bb6a;
    border-radius: 10px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .contact-form button:hover {
    background: linear-gradient(135deg, #66bb6a, #4caf50);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(76, 175, 80, 0.3);
  }

  /* Dark Mode Styles */
  body.dark-mode {
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%) !important;
  }

  body.dark-mode .contact-section {
    background: linear-gradient(135deg, #2c2c2c 0%, #3a3a3a 100%) !important;
    box-shadow: 0 8px 25px rgba(76, 175, 80, 0.2) !important;
    border-color: rgba(102, 187, 106, 0.3) !important;
  }

  body.dark-mode .contact-section h1 {
    color: #81c784 !important;
  }

  body.dark-mode .contact-section p {
    color: #b0bec5 !important;
  }

  body.dark-mode .contact-form input,
  body.dark-mode .contact-form textarea {
    background: rgba(50, 50, 50, 0.9) !important;
    border-color: #4caf50 !important;
    color: #e0e0e0 !important;
  }

  body.dark-mode .contact-form input::placeholder,
  body.dark-mode .contact-form textarea::placeholder {
    color: #a0a0a0 !important;
  }

  body.dark-mode .contact-form input:focus,
  body.dark-mode .contact-form textarea:focus {
    border-color: #66bb6a !important;
    box-shadow: 0 0 0 3px rgba(102, 187, 106, 0.3) !important;
  }

  body.dark-mode .contact-form button {
    background: linear-gradient(135deg, #2e7d32, #1b5e20) !important;
    border-color: #4caf50 !important;
  }

  body.dark-mode .contact-form button:hover {
    background: linear-gradient(135deg, #4caf50, #2e7d32) !important;
    box-shadow: 0 6px 20px rgba(76, 175, 80, 0.4) !important;
  }

  @media (max-width: 768px) {
    .contact-section {
      margin: 20px;
      padding: 20px;
    }
  }
</style>
@endsection
