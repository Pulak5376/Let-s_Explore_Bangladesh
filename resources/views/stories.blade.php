@extends('layouts.app')

@section('title', 'Gallery')

@section('content')
<section class="gallery-section" style="padding: 40px; background-color: #f9f9f9;">
  <div style="text-align: center; margin-bottom: 30px;">
    <h1 style="font-size: 36px; color: #333;">Gallery</h1>
    <p style="font-size: 18px; color: #666;">Explore the beauty of Bangladesh through stunning visuals.</p>
  </div>

  <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px;">
    <!-- Card 1 -->
    <div style="background-color: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
      <img src="https://upload.wikimedia.org/wikipedia/commons/8/88/Sundarbans_Mangrove_Forest_-_Bangladesh_-_DSC05234.JPG" alt="Sundarbans" style="width: 100%; height: 200px; object-fit: cover;">
      <div style="padding: 15px;">
        <h3 style="margin: 0 0 10px;">Sundarbans</h3>
        <p>World’s largest mangrove forest and home of the Royal Bengal Tiger.</p>
      </div>
    </div>

    <!-- Card 2 -->
    <div style="background-color: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
      <img src="https://upload.wikimedia.org/wikipedia/commons/5/57/Saint_Martin_Island_%28Bangladesh%29.jpg" alt="Saint Martin's Island" style="width: 100%; height: 200px; object-fit: cover;">
      <div style="padding: 15px;">
        <h3 style="margin: 0 0 10px;">Saint Martin's Island</h3>
        <p>A tropical paradise with crystal-clear water and coral reefs.</p>
      </div>
    </div>

    <!-- Card 3 -->
    <div style="background-color: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
      <img src="https://upload.wikimedia.org/wikipedia/commons/2/2b/Sajek_Valley_Rangamati.jpg" alt="Sajek Valley" style="width: 100%; height: 200px; object-fit: cover;">
      <div style="padding: 15px;">
        <h3 style="margin: 0 0 10px;">Sajek Valley</h3>
        <p>Known as the 'Queen of Hills', Sajek offers panoramic hill views above clouds.</p>
      </div>
    </div>

    <!-- Card 4 -->
    <div style="background-color: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
      <img src="https://upload.wikimedia.org/wikipedia/commons/6/6e/Jaflong_Sylhet.jpg" alt="Jaflong" style="width: 100%; height: 200px; object-fit: cover;">
      <div style="padding: 15px;">
        <h3 style="margin: 0 0 10px;">Jaflong</h3>
        <p>Famous for tea gardens, stone collections, and the clear river at Sylhet border.</p>
      </div>
    </div>

    <!-- Card 5 -->
    <div style="background-color: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
      <img src="https://upload.wikimedia.org/wikipedia/commons/f/fd/Ahsan_Manzil_%28pink_palace%29.jpg" alt="Ahsan Manzil" style="width: 100%; height: 200px; object-fit: cover;">
      <div style="padding: 15px;">
        <h3 style="margin: 0 0 10px;">Ahsan Manzil</h3>
        <p>Historic pink palace in Dhaka, showcasing Mughal and colonial architecture.</p>
      </div>
    </div>

    <!-- Card 6 -->
    <div style="background-color: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
      <img src="https://upload.wikimedia.org/wikipedia/commons/f/f1/Patenga_sea_beach_Chittagong.jpg" alt="Patenga Sea Beach" style="width: 100%; height: 200px; object-fit: cover;">
      <div style="padding: 15px;">
        <h3 style="margin: 0 0 10px;">Patenga Beach</h3>
        <p>Popular seaside destination in Chittagong with sunsets and street food.</p>
      </div>
    </div>
  </div>
</section>
@endsection
