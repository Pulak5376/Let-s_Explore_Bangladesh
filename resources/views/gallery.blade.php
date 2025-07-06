@extends('layouts.app')

@section('title', 'Gallery')

@section('content')
<section class="gallery-section" style="padding: 50px 20px; background-color: #fff8f0;">
  <h1 style="text-align: center; font-size: 2.5rem; color: #333; margin-bottom: 40px;">Discover Bangladesh Through Images</h1>
  <div class="gallery-grid" style="
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    max-width: 1200px;
    margin: auto;
  ">
    <div style="background: #fff; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); overflow: hidden;">
      <img src="https://upload.wikimedia.org/wikipedia/commons/8/88/Sundarbans_Mangrove_Forest_-_Bangladesh_-_DSC05234.JPG" alt="Sundarbans" style="width: 100%; height: 200px; object-fit: cover;">
      <div style="padding: 15px;">
        <h3 style="margin: 0 0 10px;">Sundarbans Mangrove Forest</h3>
        <p style="color: #555;">Explore the world's largest mangrove forest, home to the majestic Royal Bengal Tiger and a UNESCO World Heritage Site.</p>
      </div>
    </div>

    <div style="background: #fff; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); overflow: hidden;">
      <img src="https://upload.wikimedia.org/wikipedia/commons/5/52/Cox%27s_Bazar_Beach_2.jpg" alt="Cox's Bazar" style="width: 100%; height: 200px; object-fit: cover;">
      <div style="padding: 15px;">
        <h3 style="margin: 0 0 10px;">Cox's Bazar Beach</h3>
        <p style="color: #555;">Visit the longest natural sea beach in the world and enjoy the serene view of the Bay of Bengal.</p>
      </div>
    </div>

    <div style="background: #fff; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); overflow: hidden;">
      <img src="https://upload.wikimedia.org/wikipedia/commons/f/fb/Traditional_dance_in_Bangladesh.jpg" alt="Cultural Dance" style="width: 100%; height: 200px; object-fit: cover;">
      <div style="padding: 15px;">
        <h3 style="margin: 0 0 10px;">Traditional Cultural Dance</h3>
        <p style="color: #555;">Immerse yourself in the vibrant traditions and folklore of Bangladesh through its rich dance heritage.</p>
      </div>
    </div>

    <div style="background: #fff; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); overflow: hidden;">
      <img src="https://upload.wikimedia.org/wikipedia/commons/6/67/Rangamati_Lake_01.jpg" alt="Rangamati Lake" style="width: 100%; height: 200px; object-fit: cover;">
      <div style="padding: 15px;">
        <h3 style="margin: 0 0 10px;">Rangamati Lake</h3>
        <p style="color: #555;">A tranquil lake surrounded by green hills—perfect for boat rides and exploring indigenous cultures.</p>
      </div>
    </div>

    <div style="background: #fff; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); overflow: hidden;">
      <img src="https://upload.wikimedia.org/wikipedia/commons/4/40/Bandarban_Morning_view.jpg" alt="Bandarban Hills" style="width: 100%; height: 200px; object-fit: cover;">
      <div style="padding: 15px;">
        <h3 style="margin: 0 0 10px;">Bandarban Hills</h3>
        <p style="color: #555;">Experience breathtaking mountain views, waterfalls, and tribal life in this hill district paradise.</p>
      </div>
    </div>

    <div style="background: #fff; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); overflow: hidden;">
      <img src="https://upload.wikimedia.org/wikipedia/commons/0/0b/Srimangal_Countryside.JPG" alt="Srimangal Countryside" style="width: 100%; height: 200px; object-fit: cover;">
      <div style="padding: 15px;">
        <h3 style="margin: 0 0 10px;">Srimangal Countryside</h3>
        <p style="color: #555;">Known as the tea capital of Bangladesh, Srimangal offers rolling green tea gardens and peaceful rural charm.</p>
      </div>
    </div>
  </div>
</section>
@endsection
