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
      <img src="https://www.travelandexplorebd.com/storage/app/public/posts/April2020/41.jpg" alt="Jaflong" style="width: 100%; height: 200px; object-fit: cover;">
      <div style="padding: 15px;">
        <h3 style="margin: 0 0 10px;">Jaflong</h3>
        <p style="color: #555;">Jaflong is a hill station and tourist destination in the Division of Sylhet, Bangladesh.</p>
      </div>
    </div>

    <div style="background: #fff; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); overflow: hidden;">
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/23/Sundarban_Tiger.jpg/330px-Sundarban_Tiger.jpg" alt="Sundarbans" style="width: 100%; height: 200px; object-fit: cover;">
      <div style="padding: 15px;">
        <h3 style="margin: 0 0 10px;">Sundarbans Forest</h3>
        <p style="color: #555;">Explore the world's largest mangrove forest, home to the majestic Royal Bengal Tiger and a UNESCO World Heritage Site.</p>
      </div>
    </div>

    <div style="background: #fff; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); overflow: hidden;">
      <img src="https://images.hive.blog/768x0/https://cdn.pixabay.com/photo/2018/03/20/14/00/sea-3243357_960_720.jpg" alt="Cox's Bazar" style="width: 100%; height: 200px; object-fit: cover;">
      <div style="padding: 15px;">
        <h3 style="margin: 0 0 10px;">Cox's Bazar Beach</h3>
        <p style="color: #555;">Visit the longest natural sea beach in the world and enjoy the serene view of the Bay of Bengal.</p>
      </div>
    </div>

    <div style="background: #fff; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); overflow: hidden;">
      <img src="https://upload.wikimedia.org/wikipedia/commons/5/50/Sajek_Valley_20161205.jpg" alt="Sajek Valley" style="width: 100%; height: 200px; object-fit: cover;">
      <div style="padding: 15px;">
        <h3 style="margin: 0 0 10px;">Sajek Valley</h3>
        <p style="color: #555;">Sajek Valley is the "Queen of Hills and the "Roof of Rangamati, the valley is known for its greenery and dense forests.</p>
      </div>
    </div>

    <div style="background: #fff; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); overflow: hidden;">
      <img src="https://cosmosgroup.sgp1.digitaloceanspaces.com/news/details/5967770_Kaptai%20Lake%20Rangamati%20Travel%20guide.jpg" alt="Kaptai Lake" style="width: 100%; height: 200px; object-fit: cover;">
      <div style="padding: 15px;">
        <h3 style="margin: 0 0 10px;">Kaptai Lake</h3>
        <p style="color: #555;">A tranquil lake surrounded by green hills—perfect for boat rides and exploring indigenous cultures.</p>
      </div>
    </div>

    <div style="background: #fff; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); overflow: hidden;">
      <img src="https://ttg.com.bd/uploads/tours/plans/204_36376273530_3c9a0335f5_b-copyjpg.webp" alt="Bandarban Hills" style="width: 100%; height: 200px; object-fit: cover;">
      <div style="padding: 15px;">
        <h3 style="margin: 0 0 10px;">Bandarban Hills</h3>
        <p style="color: #555;">Experience breathtaking mountain views, waterfalls, and tribal life in this hill district paradise.</p>
      </div>
    </div>

    <div style="background: #fff; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); overflow: hidden;">
      <img src="https://media-cdn.tripadvisor.com/media/attractions-splice-spp-720x480/0a/32/be/dc.jpg" alt="Srimangal Countryside" style="width: 100%; height: 200px; object-fit: cover;">
      <div style="padding: 15px;">
        <h3 style="margin: 0 0 10px;">Srimangal Countryside</h3>
        <p style="color: #555;">Known as the tea capital of Bangladesh, Srimangal offers rolling green tea gardens and peaceful rural charm.</p>
      </div>
    </div>
  </div>
</section>
@endsection