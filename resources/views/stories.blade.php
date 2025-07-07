@extends('layouts.app')

@section('title', 'Stories')

@section('content')
<section class="stories-section" style="padding: 40px; background-color: #f9f9f9;">
  <div style="text-align: center; margin-bottom: 30px;">
    <h1 style="font-size: 36px; color: #333;">Travel Stories</h1>
    <p style="font-size: 18px; color: #666;">Read inspiring stories from travelers exploring Bangladesh.</p>
  </div>

  <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;">
    <div style="background-color: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
      <img src="https://sundarbantravel.com/wp-content/uploads/2023/02/River_in_Sundarban.jpg" alt="Sundarbans Adventure" style="width: 100%; height: 180px; object-fit: cover;">
      <div style="padding: 18px;">
        <h3 style="margin: 0 0 10px;">Into the Wild: Sundarban Adventure</h3>
        <p style="color: #555;">"Cruising through the mangrove labyrinth, I spotted a Royal Bengal Tiger’s paw print on the muddy bank. The silence was broken only by the call of distant birds. The Sundarbans felt truly magical."</p>
        <div style="font-size: 14px; color: #888; margin-top: 10px;">— Farhan Rahman</div>
      </div>
    </div>

    <div style="background-color: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
      <img src="https://upload.wikimedia.org/wikipedia/commons/d/db/Saint_Martins_Island_with_boats_in_foreground.jpg" alt="Saint Martin's Island" style="width: 100%; height: 180px; object-fit: cover;">
      <div style="padding: 18px;">
        <h3 style="margin: 0 0 10px;">A Night Under the Stars: Saint Martin’s</h3>
        <p style="color: #555;">"We camped on the beach, grilled fresh fish, and watched the Milky Way stretch across the sky. The sound of waves and the salty breeze made it unforgettable."</p>
        <div style="font-size: 14px; color: #888; margin-top: 10px;">— Nusrat Jahan</div>
      </div>
    </div>

    <div style="background-color: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
      <img src="https://upload.wikimedia.org/wikipedia/commons/2/2b/Sajek_Valley_Rangamati_3.jpg" alt="Sajek Valley" style="width: 100%; height: 180px; object-fit: cover;">
      <div style="padding: 18px;">
        <h3 style="margin: 0 0 10px;">Above the Clouds: Sajek Valley</h3>
        <p style="color: #555;">"Waking up to a sea of clouds below our cottage was surreal. The hills, the sunrise, and the warmth of the local people made Sajek a dream come true."</p>
        <div style="font-size: 14px; color: #888; margin-top: 10px;">— Tanvir Alam</div>
      </div>
    </div>

    <div style="background-color: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
      <img src="https://upload.wikimedia.org/wikipedia/commons/6/66/Boat_in_river%2C_Bangladesh.jpg" alt="Jaflong" style="width: 100%; height: 180px; object-fit: cover;">
      <div style="padding: 18px;">
        <h3 style="margin: 0 0 10px;">River Stones: Jaflong</h3>
        <p style="color: #555;">"We crossed the crystal-clear river on a bamboo raft and wandered through endless tea gardens. Jaflong’s natural beauty is unmatched."</p>
        <div style="font-size: 14px; color: #888; margin-top: 10px;">— Shama Islam</div>
      </div>
    </div>

    <div style="background-color: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
      <img src="https://upload.wikimedia.org/wikipedia/commons/4/42/Paharpur_Buddhist_Bihar.jpg" alt="Paharpur Ruins" style="width: 100%; height: 180px; object-fit: cover;">
      <div style="padding: 18px;">
        <h3 style="margin: 0 0 10px;">Echoes of History: Paharpur Ruins</h3>
        <p style="color: #555;">"Walking among the ancient bricks of Somapura Mahavihara, I felt transported to another era. The grandeur and serenity of the ruins left me in awe."</p>
        <div style="font-size: 14px; color: #888; margin-top: 10px;">— Rafiq Hasan</div>
      </div>
    </div>

    <div style="background-color: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
      <img src="https://images.hive.blog/768x0/https://cdn.pixabay.com/photo/2018/03/20/14/00/sea-3243357_960_720.jpg" alt="Cox's Bazar" style="width: 100%; height: 180px; object-fit: cover;">
      <div style="padding: 18px;">
        <h3 style="margin: 0 0 10px;">Waves and Wonders: Cox's Bazar</h3>
        <p style="color: #555;">"The endless stretch of golden sand and the roar of the Bay of Bengal made me feel free. Sunset at Cox’s Bazar is something everyone should experience."</p>
        <div style="font-size: 14px; color: #888; margin-top: 10px;">— Laila Chowdhury</div>
      </div>
    </div>

    <div style="background-color: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
      <img src="https://cdn-jlkmh.nitrocdn.com/JBpvnBXJHwcvYfacMymVcdLoTRonnoqY/assets/images/optimized/rev-a1adf00/royalbengaltours.com/wp-content/uploads/2019/08/A-glimpse-into-the-lives-of-tea-workers-in-Sreemangal-Bangladesh.webp" alt="Srimangal" style="width: 100%; height: 180px; object-fit: cover;">
      <div style="padding: 18px;">
        <h3 style="margin: 0 0 10px;">Tea Trails: Srimangal</h3>
        <p style="color: #555;">"Cycling through the lush tea gardens and tasting the famous seven-layer tea was a delight. Srimangal’s tranquility is perfect for a peaceful getaway."</p>
        <div style="font-size: 14px; color: #888; margin-top: 10px;">— Mehzabin Karim</div>
      </div>
    </div>

    <div style="background-color: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
      <img src="https://www.travelmate.com.bd/wp-content/uploads/2015/07/Qhseck8.jpg.webp" alt="Bandarban" style="width: 100%; height: 180px; object-fit: cover;">
      <div style="padding: 18px;">
        <h3 style="margin: 0 0 10px;">Hilltop Serenity: Bandarban</h3>
        <p style="color: #555;">"Hiking up Nilgiri, the clouds drifted below my feet. The panoramic views and the hospitality of the hill people made my journey unforgettable."</p>
        <div style="font-size: 14px; color: #888; margin-top: 10px;">— Arif Mahmud</div>
      </div>
    </div>
  </div>
</section>
@endsection
