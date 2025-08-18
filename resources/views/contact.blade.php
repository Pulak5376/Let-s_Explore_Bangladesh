<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body{font-family:sans-serif; background:#f4f4f4; margin:0; padding:20px;}
        .container{max-width:600px; margin:0 auto; background:#fff; padding:20px; border-radius:8px; box-shadow:0 2px 5px rgba(0,0,0,0.1);}
        h1{text-align:center; margin-bottom:20px;}
        input, textarea{width:100%; padding:10px; margin-bottom:15px; border-radius:5px; border:1px solid #ccc; font-size:16px;}
        button{padding:10px 20px; font-size:16px; border:none; border-radius:5px; background:#007bff; color:#fff; cursor:pointer;}
        button:hover{background:#0056b3;}
        .success{background:#d4edda; color:#155724; padding:10px; margin-bottom:15px; border-radius:5px;}
    </style>
</head>
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
</html>
