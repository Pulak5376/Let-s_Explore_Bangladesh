<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <style>
        body{font-family:sans-serif; background:#f4f4f4; margin:0; padding:20px;}
        .gallery-container{display:flex; flex-wrap:wrap; gap:20px; justify-content:center;}
        .post-card{background:#fff; padding:16px; border-radius:8px; box-shadow:0 2px 5px rgba(0,0,0,0.1); width:300px;}
        .post-card img{width:100%; border-radius:8px; height:200px; object-fit:cover;}
        h2{margin:8px 0; font-size:1.2em;}
        p{margin:4px 0;}
        .location{color:#555; font-weight:600;}
    </style>
</head>
<body>
    <h1 style="text-align:center; margin-bottom:20px;">Gallery</h1>
    <div class="gallery-container">
        @forelse($galleries as $gallery)
            <div class="post-card">
                <img src="{{ $gallery->image_url }}" alt="{{ $gallery->title }}" onerror="this.style.display='none'">
                <h2>{{ $gallery->title }}</h2>
                <p class="location">{{ $gallery->location }}</p>
                <p>{{ $gallery->description }}</p>
            </div>
        @empty
            <p>No gallery items available.</p>
        @endforelse
    </div>
</body>
</html>
