@extends('layouts.app')

@section('title', 'Gallery')
@section('content')

    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #f8f9fa, #e8f5e8);
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 106, 78, 0.1);
        }

        h1 {
            text-align: center;
            color: #006a4e;
            margin-bottom: 20px;
            font-size: 2rem;
        }

        input, textarea {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        input:focus, textarea:focus {
            border-color: #006a4e;
            outline: none;
        }

        button {
            width: 100%;
            padding: 15px;
            font-size: 1.2rem;
            border: none;
            border-radius: 8px;
            background: linear-gradient(135deg, #006a4e, #4caf50);
            color: white;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: linear-gradient(135deg, #4caf50, #006a4e);
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            text-align: center;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 1.8rem;
            }

            button {
                font-size: 1rem;
            }
        }
    </style>

<body>
    <div class="container">
        <h1>Contact Us</h1>

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('contact.store') }}">
            @csrf
            <input type="text" name="full_name" placeholder="Full Name" required>
            <input type="email" name="email_address" placeholder="Email Address" required>
            <input type="text" name="subject" placeholder="Subject (optional)">
            <textarea name="description" rows="5" placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </div>
</body>
@endsection
