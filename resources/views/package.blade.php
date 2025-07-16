@extends('layouts.app')

@section('title', 'Combo Packages')

@section('content')
<section class="combo-section" style="max-width: 900px; margin: 40px auto; padding: 24px; background: #fff; border-radius: 10px; box-shadow: 0 2px 12px #d2e3e7;">
    <h1 style="text-align:center; color:#1e7e34; margin-bottom: 30px;">Combo Offers: Sylhet & Sreemangal</h1>
    
    <div class="combo-card" style="margin-bottom: 40px; padding: 20px; border-radius: 8px; background: #f8fafc; box-shadow: 0 2px 8px #e0e0e0;">
        <h2 style="color:#2a6d8f;">Sylhet Combo Offer</h2>
        <img src="https://upload.wikimedia.org/wikipedia/commons/7/77/Keane_Bridge_and_Ali_Amjad%27s_Clock%2C_Sylhet.jpg" alt="Sylhet" style="width:100%; max-width:400px; border-radius:8px; margin: 15px 0;">
        <ul style="font-size:1.1rem; color:#444;">
            <li><strong>Duration:</strong> 3 Days, 2 Nights</li>
            <li><strong>Includes:</strong> Jaflong, Ratargul Swamp Forest, Lalakhal, Keane Bridge, Ali Amjad’s Clock</li>
            <li><strong>Accommodation:</strong> 3-star hotel with breakfast</li>
            <li><strong>Transport:</strong> AC Microbus for all local sightseeing</li>
            <li><strong>Price:</strong> BDT 5,500/- per person</li>
        </ul>
        <p style="margin-top:10px;">Experience the best of Sylhet with this all-in-one package. Perfect for families and groups!</p>
    </div>

    <div class="combo-card" style="padding: 20px; border-radius: 8px; background: #f8fafc; box-shadow: 0 2px 8px #e0e0e0;">
        <h2 style="color:#2a6d8f;">Sreemangal Combo Offer</h2>
        <img src="https://upload.wikimedia.org/wikipedia/commons/1/1e/Sreemangal_tea_garden_2017-08-20.jpg" alt="Sreemangal" style="width:100%; max-width:400px; border-radius:8px; margin: 15px 0;">
        <ul style="font-size:1.1rem; color:#444;">
            <li><strong>Duration:</strong> 2 Days, 1 Night</li>
            <li><strong>Includes:</strong> Lawachara Rain Forest, Tea Garden Tour, Madhabpur Lake, Nilkantha Tea Cabin</li>
            <li><strong>Accommodation:</strong> Eco-resort stay with breakfast</li>
            <li><strong>Transport:</strong> Private car for all transfers</li>
            <li><strong>Price:</strong> BDT 3,800/- per person</li>
        </ul>
        <p style="margin-top:10px;">Discover the green paradise of Sreemangal with our exclusive combo offer. Ideal for nature lovers!</p>
    </div>
</section>

<style>
  .combo-section {
    background: linear-gradient(135deg, #f1f8e9 0%, #e8f5e8 100%) !important;
    border: 2px solid rgba(102, 187, 106, 0.2) !important;
    box-shadow: 0 8px 25px rgba(46, 125, 50, 0.15) !important;
  }

  .combo-section h1 {
    color: #2e7d32 !important;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
  }

  .combo-card {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(248, 251, 248, 0.8)) !important;
    border: 1px solid rgba(102, 187, 106, 0.2) !important;
    box-shadow: 0 4px 15px rgba(46, 125, 50, 0.1) !important;
    transition: all 0.3s ease;
  }

  .combo-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(46, 125, 50, 0.2) !important;
    border-color: rgba(102, 187, 106, 0.3) !important;
  }

  .combo-card h2 {
    color: #2e7d32 !important;
  }

  .combo-card ul li {
    color: #388e3c !important;
  }

  .combo-card p {
    color: #558b2f !important;
  }

  /* Dark Mode Styles */
  body.dark-mode {
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%) !important;
  }

  body.dark-mode .combo-section {
    background: linear-gradient(135deg, #2c2c2c 0%, #3a3a3a 100%) !important;
    border-color: rgba(102, 187, 106, 0.3) !important;
    box-shadow: 0 8px 25px rgba(76, 175, 80, 0.2) !important;
  }

  body.dark-mode .combo-section h1 {
    color: #81c784 !important;
  }

  body.dark-mode .combo-card {
    background: linear-gradient(135deg, rgba(50, 50, 50, 0.9), rgba(60, 60, 60, 0.8)) !important;
    border-color: rgba(102, 187, 106, 0.3) !important;
    box-shadow: 0 4px 15px rgba(76, 175, 80, 0.2) !important;
  }

  body.dark-mode .combo-card:hover {
    box-shadow: 0 8px 25px rgba(76, 175, 80, 0.3) !important;
    border-color: rgba(102, 187, 106, 0.4) !important;
  }

  body.dark-mode .combo-card h2 {
    color: #66bb6a !important;
  }

  body.dark-mode .combo-card ul li {
    color: #a5d6a7 !important;
  }

  body.dark-mode .combo-card p {
    color: #b0bec5 !important;
  }

  @media (max-width: 768px) {
    .combo-section {
      margin: 20px;
      padding: 16px;
    }
  }
</style>
@endsection

