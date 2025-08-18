<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Bangladesh Tourist Spots</title>
    <style>
        body{font-family:sans-serif; background:#f4f4f4; margin:0; padding:20px;}
        h1{text-align:center; margin-bottom:20px;}
        .gallery-container{display:flex; flex-wrap:wrap; gap:20px; justify-content:center;}
        .post-card{background:#fff; padding:16px; border-radius:8px; box-shadow:0 2px 5px rgba(0,0,0,0.1); width:300px;}
        .post-card img{width:100%; border-radius:8px; height:200px; object-fit:cover;}
        h2{margin:8px 0; font-size:1.2em;}
        p{margin:4px 0;}
        .location{color:#555; font-weight:600;}
    </style>
</head>
<body>
    <h1>Bangladesh Tourist Spots</h1>
    <div class="gallery-container">
        <!-- Existing galleries from database -->
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

        <!-- Additional tourist spot cards (hardcoded examples) -->
        <div class="post-card">
            <img src="https://picsum.photos/id/1018/600/400" alt="Cox's Bazar Beach">
            <h2>Cox's Bazar Beach</h2>
            <p class="location">Cox's Bazar, Chattogram</p>
            <p>Longest natural sea beach in the world with golden sand and scenic views.</p>
        </div>

        <div class="post-card">
            <img src="https://picsum.photos/id/1020/600/400" alt="Sundarbans Mangrove Forest">
            <h2>Sundarbans Mangrove Forest</h2>
            <p class="location">Khulna Division</p>
            <p>Home of the Royal Bengal Tiger and largest mangrove forest in the world.</p>
        </div>

        <div class="post-card">
            <img src="https://picsum.photos/id/1021/600/400" alt="Srimangal Tea Garden">
            <h2>Sreemangal Tea Garden</h2>
            <p class="location">Sreemangal, Sylhet</p>
            <p>Beautiful rolling hills covered with tea plantations and serene landscapes.</p>
        </div>

        <div class="post-card">
            <img src="https://picsum.photos/id/1025/600/400" alt="Bandarban Hills">
            <h2>Bandarban Hills</h2>
            <p class="location">Bandarban, Chattogram</p>
            <p>Hilly terrain with waterfalls, tribal villages, and breathtaking views.</p>
        </div>

        <div class="post-card">
            <img src="https://picsum.photos/id/1030/600/400" alt="Saint Martin's Island">
            <h2>Saint Martin's Island</h2>
            <p class="location">Teknaf, Cox's Bazar</p>
            <p>Small coral island famous for turquoise waters, beaches, and marine life.</p>
        </div>
    </div>
</body>
</html>
