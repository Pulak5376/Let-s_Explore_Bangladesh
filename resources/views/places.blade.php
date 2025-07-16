@extends('layouts.app')

@section('title', 'Places')

@section('content')
<?php
$divisions = [
  [
    'id' => 'dhaka',
    'name' => 'Dhaka',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/37/Lalbagh_Fort%2C_Dhaka.jpg/800px-Lalbagh_Fort%2C_Dhaka.jpg',
    'description' => 'Capital city with rich history and culture'
  ],
  [
    'id' => 'chittagong',
    'name' => 'Chittagong',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/d/db/Saint_Martins_Island_with_boats_in_foreground.jpg',
    'description' => 'Home to Cox\'s Bazar and hill tracts'
  ],
  [
    'id' => 'sylhet',
    'name' => 'Sylhet',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/1/1e/Sreemangal_tea_garden_2017-08-20.jpg',
    'description' => 'Tea gardens and natural beauty'
  ],
  [
    'id' => 'rajshahi',
    'name' => 'Rajshahi',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/4/42/Paharpur_Buddhist_Bihar.jpg',
    'description' => 'Ancient archaeological sites'
  ],
  [
    'id' => 'khulna',
    'name' => 'Khulna',
    'image' => 'https://sundarbantravel.com/wp-content/uploads/2023/02/River_in_Sundarban.jpg',
    'description' => 'Gateway to the Sundarbans'
  ],
  [
    'id' => 'barisal',
    'name' => 'Barisal',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Floating_Guava_Market_at_Barisal.jpg/800px-Floating_Guava_Market_at_Barisal.jpg',
    'description' => 'Venice of Bengal with floating markets'
  ],
  [
    'id' => 'rangpur',
    'name' => 'Rangpur',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Tajhat_Palace_Museum.jpg/800px-Tajhat_Palace_Museum.jpg',
    'description' => 'Historical palaces and archaeological sites'
  ],
  [
    'id' => 'mymensingh',
    'name' => 'Mymensingh',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Mymensingh_Museum.jpg/800px-Mymensingh_Museum.jpg',
    'description' => 'Rich cultural heritage and natural beauty'
  ]
];

$places = [
  // Dhaka Division
  [
    'id' => 1,
    'name' => 'Lalbagh Fort',
    'duration' => '1 Day',
    'price' => 500,
    'division' => 'dhaka',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/37/Lalbagh_Fort%2C_Dhaka.jpg/800px-Lalbagh_Fort%2C_Dhaka.jpg'
  ],
  [
    'id' => 2,
    'name' => 'Ahsan Manzil',
    'duration' => '1 Day',
    'price' => 300,
    'division' => 'dhaka',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Ahsan_Manzil_Dhaka_Bangladesh.jpg/800px-Ahsan_Manzil_Dhaka_Bangladesh.jpg'
  ],
  [
    'id' => 3,
    'name' => 'Sonargaon',
    'duration' => '1 Day',
    'price' => 800,
    'division' => 'dhaka',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e5/Folk_Art_and_Crafts_Museum%2C_Sonargaon.jpg/800px-Folk_Art_and_Crafts_Museum%2C_Sonargaon.jpg'
  ],
  // Chittagong Division
  [
    'id' => 4,
    'name' => "Cox's Bazar",
    'duration' => '3 Days',
    'price' => 4500,
    'division' => 'chittagong',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/d/db/Saint_Martins_Island_with_boats_in_foreground.jpg'
  ],
  [
    'id' => 5,
    'name' => 'Bandarban',
    'duration' => '3 Days',
    'price' => 6000,
    'division' => 'chittagong',
    'image' => 'https://lh3.googleusercontent.com/gps-cs-s/AC9h4nrfKrjXKId8O-EqVuAurYfalgeAHOBT4iwE3HysRUhaPPb_o35nrpRfoPTVOjwZwzwvtr6JzxtWShTdeP1uXaQwvyHbRbtooQ67bwWtlOgCP13sSh_XuGYRtJVRuY1syKC62EAA=s680-w680-h510-rw'
  ],
  [
    'id' => 6,
    'name' => 'Rangamati',
    'duration' => '3 Days',
    'price' => 2000,
    'division' => 'chittagong',
    'image' => 'https://lh3.googleusercontent.com/gps-cs-s/AC9h4nqMMZ83iuq1LLPmgkmXDrnyMZZyJC4zbRHkxK3BmfwfSL2jL3dTVTkTN9WDLgDCIJ4KAhOyPbs2Uk0V5UP7ScaD02PzxlAdeHKS7hse5ACNYMenq0JeBBQPfCZt6uf81L3P88CT=s680-w680-h510-rw'
  ],
  [
    'id' => 7,
    'name' => 'Sajek Valley',
    'duration' => '2 Days',
    'price' => 2500,
    'division' => 'chittagong',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a1/Sajek_Valley_Bangladesh.jpg/800px-Sajek_Valley_Bangladesh.jpg'
  ],
  [
    'id' => 8,
    'name' => 'Kaptai Lake',
    'duration' => '3 Day',
    'price' => 250,
    'division' => 'chittagong',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/01/Kaptai_Lake_05.jpg/1024px-Kaptai_Lake_05.jpg'
  ],
  [
    'id' => 9,
    'name' => 'Khagrachari',
    'duration' => '2 Day',
    'price' => 4000,
    'division' => 'chittagong',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/Midway_to_Konglak_Hill%2C_Khagrachari%2C_Bangladesh.jpg/800px-Midway_to_Konglak_Hill%2C_Khagrachari%2C_Bangladesh.jpg'
  ],
  // Sylhet Division
  [
    'id' => 10,
    'name' => 'Sreemangal',
    'duration' => '2 Days',
    'price' => 2500,
    'division' => 'sylhet',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/1/1e/Sreemangal_tea_garden_2017-08-20.jpg'
  ],
  [
    'id' => 11,
    'name' => 'Sylhet City',
    'duration' => '2 Days',
    'price' => 1000,
    'division' => 'sylhet',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/7/77/Keane_Bridge_and_Ali_Amjad%27s_Clock%2C_Sylhet.jpg'
  ],
  [
    'id' => 12,
    'name' => 'Vulaganj',
    'duration' => '2 Days',
    'price' => 1800,
    'division' => 'sylhet',
    'image' => 'https://adarbepari.com/wp-content/uploads/2016/05/bholaganj-sadapathor-sylhet.jpg'
  ],
  [
    'id' => 13,
    'name' => 'Jaflong',
    'duration' => '2 Days',
    'price' => 2200,
    'division' => 'sylhet',
    'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSZWP36lsPTPR-RFvtJoT27ZQQN2eSVTHnMpg&s'
  ],
  // Rajshahi Division
  [
    'id' => 14,
    'name' => 'Paharpur',
    'duration' => '1 Day',
    'price' => 1000,
    'division' => 'rajshahi',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/4/42/Paharpur_Buddhist_Bihar.jpg'
  ],
  [
    'id' => 15,
    'name' => 'Puthia Temple Complex',
    'duration' => '1 Day',
    'price' => 800,
    'division' => 'rajshahi',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Puthia_Temple_Complex.jpg/800px-Puthia_Temple_Complex.jpg'
  ],
  [
    'id' => 16,
    'name' => 'Varendra Research Museum',
    'duration' => '1 Day',
    'price' => 500,
    'division' => 'rajshahi',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Varendra_Research_Museum.jpg/800px-Varendra_Research_Museum.jpg'
  ],
  // Khulna Division
  [
    'id' => 17,
    'name' => 'Sundarban',
    'duration' => '2 Days',
    'price' => 3500,
    'division' => 'khulna',
    'image' => 'https://sundarbantravel.com/wp-content/uploads/2023/02/River_in_Sundarban.jpg'
  ],
  [
    'id' => 18,
    'name' => 'Sixty Dome Mosque',
    'duration' => '1 Day',
    'price' => 600,
    'division' => 'khulna',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e0/Sixty_Dome_Mosque_02.jpg/800px-Sixty_Dome_Mosque_02.jpg'
  ],
  [
    'id' => 19,
    'name' => 'Kuakata Beach',
    'duration' => '2 Days',
    'price' => 2800,
    'division' => 'khulna',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4f/Kuakata_beach_sunset.jpg/800px-Kuakata_beach_sunset.jpg'
  ],
  // Barisal Division
  [
    'id' => 20,
    'name' => 'Floating Guava Market',
    'duration' => '1 Day',
    'price' => 800,
    'division' => 'barisal',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Floating_Guava_Market_at_Barisal.jpg/800px-Floating_Guava_Market_at_Barisal.jpg'
  ],
  [
    'id' => 21,
    'name' => 'Durga Sagar',
    'duration' => '1 Day',
    'price' => 600,
    'division' => 'barisal',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d8/Durga_Sagar_Barisal.jpg/800px-Durga_Sagar_Barisal.jpg'
  ],
  // Rangpur Division
  [
    'id' => 22,
    'name' => 'Tajhat Palace',
    'duration' => '1 Day',
    'price' => 700,
    'division' => 'rangpur',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Tajhat_Palace_Museum.jpg/800px-Tajhat_Palace_Museum.jpg'
  ],
  [
    'id' => 23,
    'name' => 'Kantajew Temple',
    'duration' => '1 Day',
    'price' => 500,
    'division' => 'rangpur',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Kantanagar_Temple.jpg/800px-Kantanagar_Temple.jpg'
  ],
  // Mymensingh Division
  [
    'id' => 24,
    'name' => 'Mymensingh Museum',
    'duration' => '1 Day',
    'price' => 400,
    'division' => 'mymensingh',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Mymensingh_Museum.jpg/800px-Mymensingh_Museum.jpg'
  ],
  [
    'id' => 25,
    'name' => 'Brahmaputra River',
    'duration' => '1 Day',
    'price' => 600,
    'division' => 'mymensingh',
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Brahmaputra_River_in_Mymensingh.jpg/800px-Brahmaputra_River_in_Mymensingh.jpg'
  ]
];
?>
<section class="places-section" style="padding: 40px; max-width: 1400px; margin: auto; background: linear-gradient(135deg, #e8f5e8 0%, #f1f8e9 50%, #e8f5e8 100%); min-height: 100vh;">
  <h1 style="text-align: center; margin-bottom: 20px; font-weight: 700; font-size: 2.5rem; color: #2e7d32; text-shadow: 1px 1px 3px rgba(0,0,0,0.1);">
    Explore Bangladesh by Division
  </h1>
  <p style="text-align: center; margin-bottom: 50px; color: #388e3c; font-size: 1.2rem; font-weight: 500;">
    Choose a division to discover amazing tourist destinations across Bangladesh
  </p>

  <!-- Division Filter Cards -->
  <div class="division-filter" style="margin-bottom: 50px;">
    <h2 style="text-align: center; margin-bottom: 30px; color: #2e7d32; font-size: 1.8rem; font-weight: 600;">Select a Division</h2>
    <div class="divisions-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; margin-bottom: 40px;">
      @foreach ($divisions as $division)
      <div class="division-card" data-division="{{ $division['id'] }}" style="cursor: pointer; border: 3px solid #66bb6a; border-radius: 15px; overflow: hidden; box-shadow: 0 8px 25px rgba(46, 125, 50, 0.15); transition: all 0.3s ease; background: linear-gradient(135deg, #f1f8e9 0%, #e8f5e8 100%);">
        <img src="{{ $division['image'] }}" alt="{{ $division['name'] }}" style="width: 100%; height: 180px; object-fit: cover;" />
        <div class="division-info" style="padding: 20px; text-align: center;">
          <h3 style="font-size: 1.4rem; margin-bottom: 10px; color: #2e7d32; font-weight: 600;">{{ $division['name'] }} Division</h3>
          <p style="color: #388e3c; font-size: 0.95rem; line-height: 1.4;">{{ $division['description'] }}</p>
        </div>
      </div>
      @endforeach
    </div>

    <!-- Show All Button -->
    <div style="text-align: center; margin-bottom: 30px;">
      <button id="show-all-btn" class="filter-button active" style="padding: 12px 30px; background: linear-gradient(135deg, #4caf50, #388e3c); color: white; border: 2px solid #66bb6a; border-radius: 25px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; font-size: 1rem;">
        Show All Places
      </button>
    </div>
  </div>

  <!-- Places Display -->
  <div class="places-container">
    <h2 id="places-title" style="text-align: center; margin-bottom: 30px; color: #2e7d32; font-size: 2rem; font-weight: 600;">All Tourist Places</h2>
    <div class="places-list" id="places-list" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px;">
      @foreach ($places as $place)
      <div class="place-card" data-division="{{ $place['division'] }}" style="border: 2px solid #66bb6a; border-radius: 15px; overflow: hidden; box-shadow: 0 8px 25px rgba(46, 125, 50, 0.15); transition: all 0.3s ease; background: linear-gradient(135deg, #f1f8e9 0%, #e8f5e8 100%);">
        <img src="{{ $place['image'] }}" alt="{{ $place['name'] }}" style="width: 100%; height: 200px; object-fit: cover;" />
        <div class="place-info" style="padding: 20px;">
          <h3 style="font-size: 1.3rem; margin-bottom: 10px; color: #2e7d32; font-weight: 600;">{{ $place['name'] }}</h3>
          <ul style="list-style: none; padding: 0; margin: 15px 0;">
            <li style="color: #388e3c; margin-bottom: 8px; font-weight: 500;"><strong>Duration:</strong> {{ $place['duration'] }}</li>
            <li style="color: #558b2f; font-weight: 700; font-size: 1.1rem;"><strong>Package:</strong> BDT {{ $place['price'] }}/- per person</li>
          </ul>

          <form action="{{ route('cart.add') }}" method="POST" style="text-align: center;">
            @csrf
            <input type="hidden" name="place_id" value="{{ $place['id'] }}" />
            <button type="submit" class="shadow-button">
              Add to Cart
            </button>
          </form>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<style>
  .shadow-button {
    padding: 12px 0;
    font-size: 16px;
    background: linear-gradient(135deg, #c8102e, #d32f2f);
    color: white;
    border: 2px solid #ffd700;
    border-radius: 25px;
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(200, 16, 46, 0.3);
    transition: all 0.3s ease;
    outline: none;
    width: 100%;
    font-weight: 600;
    margin-top: 15px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
  }
  .shadow-button:hover {
    box-shadow: 0 6px 20px rgba(200, 16, 46, 0.4);
    background: linear-gradient(135deg, #d32f2f, #b71c1c);
    transform: translateY(-2px);
    border-color: #ffeb3b;
  }
  .shadow-button:focus,
  .shadow-button:active {
    box-shadow: 0 0 0 4px rgba(255, 215, 0, 0.4), 0 6px 20px rgba(200, 16, 46, 0.4);
    outline: none;
  }

  .place-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 40px rgba(46, 125, 50, 0.25);
    border-color: #4caf50;
  }

  .division-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 35px rgba(46, 125, 50, 0.2);
    border-color: #4caf50;
  }

  .division-card.active {
    border-color: #4caf50;
    box-shadow: 0 10px 30px rgba(46, 125, 50, 0.3);
    transform: scale(1.02);
    background: linear-gradient(135deg, #e8f5e8 0%, #dcedc8 100%);
  }

  .filter-button {
    padding: 12px 30px;
    background: linear-gradient(135deg, #4caf50, #388e3c);
    color: white;
    border: 2px solid #66bb6a;
    border-radius: 25px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 1rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .filter-button:hover {
    background: linear-gradient(135deg, #66bb6a, #4caf50);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(76, 175, 80, 0.3);
  }

  .filter-button.active {
    background: linear-gradient(135deg, #2e7d32, #388e3c);
    box-shadow: 0 6px 20px rgba(46, 125, 50, 0.4);
    border-color: #4caf50;
  }

  .place-card {
    display: block;
    opacity: 1;
    transition: all 0.5s ease;
  }

  .place-card.hidden {
    display: none;
  }

  /* Light green page background */
  body {
    background: linear-gradient(135deg, #e8f5e8 0%, #f1f8e9 50%, #e8f5e8 100%) !important;
    min-height: 100vh;
  }

  /* Dark Mode Styles */
  body.dark-mode {
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%) !important;
    color: #e0e0e0 !important;
  }

  body.dark-mode .places-section {
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%) !important;
  }

  body.dark-mode h1,
  body.dark-mode h2,
  body.dark-mode h3 {
    color: #81c784 !important;
  }

  body.dark-mode p {
    color: #b0bec5 !important;
  }

  body.dark-mode .division-card {
    background: linear-gradient(135deg, #2c2c2c 0%, #3a3a3a 100%) !important;
    border-color: #4caf50 !important;
    box-shadow: 0 8px 25px rgba(76, 175, 80, 0.2) !important;
  }

  body.dark-mode .division-card:hover {
    background: linear-gradient(135deg, #3a3a3a 0%, #4a4a4a 100%) !important;
    box-shadow: 0 12px 35px rgba(76, 175, 80, 0.3) !important;
  }

  body.dark-mode .division-card.active {
    background: linear-gradient(135deg, #2e5d32 0%, #3e7b40 100%) !important;
    border-color: #66bb6a !important;
  }

  body.dark-mode .place-card {
    background: linear-gradient(135deg, #2c2c2c 0%, #3a3a3a 100%) !important;
    border-color: #4caf50 !important;
    box-shadow: 0 8px 25px rgba(76, 175, 80, 0.2) !important;
  }

  body.dark-mode .place-card:hover {
    background: linear-gradient(135deg, #3a3a3a 0%, #4a4a4a 100%) !important;
    box-shadow: 0 15px 40px rgba(76, 175, 80, 0.3) !important;
  }

  body.dark-mode .place-info h3 {
    color: #66bb6a !important;
  }

  body.dark-mode .place-info li {
    color: #a5d6a7 !important;
  }

  body.dark-mode .filter-button {
    background: linear-gradient(135deg, #2e7d32, #1b5e20) !important;
    border-color: #4caf50 !important;
    color: #e8f5e8 !important;
  }

  body.dark-mode .filter-button:hover {
    background: linear-gradient(135deg, #4caf50, #2e7d32) !important;
  }

  body.dark-mode .filter-button.active {
    background: linear-gradient(135deg, #1b5e20, #2e7d32) !important;
  }

  @media (max-width: 1024px) {
    .divisions-grid {
      grid-template-columns: repeat(2, 1fr) !important;
    }
    .places-list {
      grid-template-columns: repeat(2, 1fr) !important;
    }
  }
  @media (max-width: 600px) {
    .divisions-grid {
      grid-template-columns: 1fr !important;
    }
    .places-list {
      grid-template-columns: 1fr !important;
    }
    .places-section {
      padding: 20px !important;
    }
  }
</style>
@endsection

@section('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const divisionCards = document.querySelectorAll('.division-card');
    const placeCards = document.querySelectorAll('.place-card');
    const placesTitle = document.getElementById('places-title');
    const showAllBtn = document.getElementById('show-all-btn');

    // Division names mapping
    const divisionNames = {
      'dhaka': 'Dhaka',
      'chittagong': 'Chittagong',
      'sylhet': 'Sylhet',
      'rajshahi': 'Rajshahi',
      'khulna': 'Khulna',
      'barisal': 'Barisal',
      'rangpur': 'Rangpur',
      'mymensingh': 'Mymensingh'
    };

    // Function to filter places by division
    function filterPlaces(selectedDivision) {
      placeCards.forEach(card => {
        const cardDivision = card.getAttribute('data-division');
        if (selectedDivision === 'all' || cardDivision === selectedDivision) {
          card.classList.remove('hidden');
          card.style.display = 'block';
        } else {
          card.classList.add('hidden');
          card.style.display = 'none';
        }
      });

      // Update title
      if (selectedDivision === 'all') {
        placesTitle.textContent = 'All Tourist Places';
      } else {
        placesTitle.textContent = `${divisionNames[selectedDivision]} Division - Tourist Places`;
      }

      // Update active states
      divisionCards.forEach(card => card.classList.remove('active'));
      if (selectedDivision !== 'all') {
        document.querySelector(`[data-division="${selectedDivision}"]`).classList.add('active');
      }
    }

    // Add click event listeners to division cards
    divisionCards.forEach(card => {
      card.addEventListener('click', function() {
        const selectedDivision = this.getAttribute('data-division');
        filterPlaces(selectedDivision);
        
        // Scroll to places section
        document.getElementById('places-list').scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      });
    });

    // Show all button functionality
    showAllBtn.addEventListener('click', function() {
      filterPlaces('all');
      divisionCards.forEach(card => card.classList.remove('active'));
    });

    // Add to cart button functionality
    document.querySelectorAll('.shadow-button').forEach(function(btn) {
      btn.addEventListener('click', function(e) {
        // Add visual feedback with Bangladesh theme
        const originalText = btn.textContent;
        btn.textContent = 'Added!';
        btn.style.background = 'linear-gradient(135deg, #ffd700, #ffeb3b)';
        btn.style.color = '#c8102e';
        btn.style.borderColor = '#c8102e';
        btn.style.fontWeight = '700';
        
        setTimeout(function() {
          btn.textContent = originalText;
          btn.style.background = 'linear-gradient(135deg, #c8102e, #d32f2f)';
          btn.style.color = 'white';
          btn.style.borderColor = '#ffd700';
          btn.style.fontWeight = '600';
        }, 1000);
      });
    });
  });
</script>
@endsection
