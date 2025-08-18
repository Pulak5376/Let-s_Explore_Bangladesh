
@extends('layouts.app')

@section('title', 'Explore Places')
@section('content')
<style>
	@import url('https://unpkg.com/aos@2.3.1/dist/aos.css');
	.places-hero {
		background: linear-gradient(135deg, rgba(0,0,0,0.3) 0%, rgba(0,106,78,0.2) 50%, rgba(0,0,0,0.4) 100%), url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80') center/cover;
		padding: 8rem 2rem;
		text-align: center;
		color: white;
		position: relative;
		overflow: hidden;
		min-height: 70vh;
		display: flex;
		align-items: center;
		justify-content: center;
		background-size: 120%;
		animation: zoomOut 20s ease-in-out infinite;
	}
	@keyframes zoomOut {
		0% { background-size: 120%; background-position: center center; }
		50% { background-size: 100%; background-position: center center; }
		100% { background-size: 120%; background-position: center center; }
	}
	.places-hero::before {
		content: '';
		position: absolute;
		top: 0; left: 0; right: 0; bottom: 0;
		background: linear-gradient(45deg, rgba(0,0,0,0.2) 0%, rgba(0,106,78,0.1) 100%);
		z-index: 1;
		animation: gradientShift 8s ease-in-out infinite;
	}
	@keyframes gradientShift {
		0%,100% { background: linear-gradient(45deg, rgba(0,0,0,0.2) 0%, rgba(0,106,78,0.1) 100%); }
		50% { background: linear-gradient(45deg, rgba(0,106,78,0.1) 0%, rgba(0,0,0,0.3) 100%); }
	}
	.places-hero > * { position: relative; z-index: 2; }
	.hero-content { max-width: 800px; animation: heroSlideUp 1.5s ease-out; }
	@keyframes heroSlideUp {
		0% { opacity: 0; transform: translateY(100px); }
		100% { opacity: 1; transform: translateY(0); }
	}
	.hero-title {
		font-size: 3rem;
		font-weight: 800;
		margin-bottom: 1.5rem;
		text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
		background: linear-gradient(135deg, #ffffff, #f0f9ff);
		-webkit-background-clip: text;
		-webkit-text-fill-color: transparent;
		background-clip: text;
		animation: titleGlow 3s ease-in-out infinite;
	}
	@keyframes titleGlow {
		0%,100% { filter: drop-shadow(0 0 10px rgba(255,255,255,0.3)); }
		50% { filter: drop-shadow(0 0 20px rgba(255,255,255,0.6)); }
	}
	.hero-subtitle {
		font-size: 1.4rem;
		opacity: 0.95;
		margin-bottom: 2rem;
		text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
		animation: subtitleFade 2s ease-out 0.5s both;
	}
	@keyframes subtitleFade {
		0% { opacity: 0; transform: translateY(30px); }
		100% { opacity: 0.95; transform: translateY(0); }
	}
	.places-container {
		max-width: 1200px;
		margin: 0 auto;
		padding: 6rem 2rem;
		background: linear-gradient(135deg, #f8f9fa 0%, #e8f5e8 100%);
		min-height: 100vh;
	}

	.alert {
		padding: 15px 20px;
		border-radius: 10px;
		margin-bottom: 30px;
		border: none;
		font-weight: 500;
		animation: alertSlideIn 0.5s ease-out;
	}

	.alert-success {
		background: linear-gradient(135deg, #d4edda, #c3e6cb);
		color: #155724;
		box-shadow: 0 4px 15px rgba(40, 167, 69, 0.2);
	}

	@keyframes alertSlideIn {
		0% { opacity: 0; transform: translateY(-20px); }
		100% { opacity: 1; transform: translateY(0); }
	}
	.places-grid {
		display: grid;
		grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
		gap: 3rem;
		margin-bottom: 4rem;
	}
	.place-card {
		background: white;
		border-radius: 25px;
		overflow: hidden;
		box-shadow: 0 15px 50px rgba(0,106,78,0.1);
		transition: all 0.4s cubic-bezier(0.175,0.885,0.32,1.275);
		position: relative;
		border: 2px solid rgba(0,106,78,0.1);
		display: flex;
		flex-direction: column;
	}
	.place-card:hover {
		transform: translateY(-20px) scale(1.02);
		box-shadow: 0 30px 60px rgba(0,106,78,0.2);
		border-color: rgba(0,106,78,0.3);
	}
	.place-image {
		width: 100%;
		height: 260px;
		object-fit: cover;
		transition: transform 0.6s ease;
		transform: scale(1.1);
		animation: cardImageZoom 15s ease-in-out infinite;
	}
	@keyframes cardImageZoom {
		0%,100% { transform: scale(1.1); }
		50% { transform: scale(1); }
	}
	.place-card:hover .place-image {
		transform: scale(1.15);
		animation-play-state: paused;
	}
	.place-body {
		padding: 2.5rem;
		flex: 1;
		display: flex;
		flex-direction: column;
	}
	.place-title {
		font-size: 1.6rem;
		font-weight: 700;
		color: #006a4e;
		margin-bottom: 1rem;
		line-height: 1.3;
	}
	.place-location {
		color: #888;
		font-size: 1rem;
		margin-bottom: 10px;
	}
	.place-description {
		font-size: 1.08rem;
		color: #333;
		margin-bottom: 12px;
	}
	.place-footer {
		margin-top: auto;
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
	.place-price {
		font-weight: 600;
		color: #ff6b35;
		font-size: 1.2rem;
	}
	.place-badge {
		background: #e0f7fa;
		color: #00695c;
		border-radius: 16px;
		padding: 4px 12px;
		font-size: 0.95rem;
	}

	.add-cart-btn {
		width: 100%;
		background: linear-gradient(135deg, #006a4e, #4caf50);
		color: white;
		border: none;
		padding: 0.75rem 1rem;
		border-radius: 12px;
		font-size: 1rem;
		font-weight: 600;
		cursor: pointer;
		transition: all 0.3s ease;
		display: flex;
		align-items: center;
		justify-content: center;
		gap: 0.5rem;
	}

	.add-cart-btn:hover {
		background: linear-gradient(135deg, #4caf50, #2e7d32);
		transform: translateY(-2px);
		box-shadow: 0 8px 20px rgba(76, 175, 80, 0.3);
	}

	.add-cart-btn:active {
		transform: translateY(0);
		box-shadow: 0 4px 10px rgba(76, 175, 80, 0.3);
	}
</style>

<!-- Hero Section -->
<section class="places-hero">
	<div class="hero-content">
		<h1 class="hero-title">Explore Beautiful Places</h1>
		<p class="hero-subtitle">Discover Bangladesh's most stunning destinations, handpicked for your next adventure.</p>
	</div>
</section>

<div class="places-container">
	@if(session('success'))
		<div class="alert alert-success">
			<i class="fas fa-check-circle me-2"></i>{{ session('success') }}
		</div>
	@endif

	<div class="places-grid">
		@foreach($places as $place)
			<div class="place-card" data-aos="fade-up">
				<img src="{{ $place['image_path'] ?? '' }}" alt="{{ $place['name'] ?? '' }}" class="place-image">
				<div class="place-body">
					<h3 class="place-title">{{ $place['name'] ?? '' }}</h3>
					<div class="place-location">📍 {{ $place['location'] ?? '' }}</div>
					<div class="place-description">{{ $place['description'] ?? '' }}</div>
								<div class="place-footer">
									<span class="place-price">৳{{ $place['price'] ?? '' }}</span>
									<span class="place-badge">{{ $place['day'] ?? '' }} days, {{ $place['person'] ?? '' }} persons</span>
								</div>
								<form method="POST" action="{{ route('cart.add') }}" style="margin-top:18px;">
									@csrf
									<input type="hidden" name="id" value="{{ $place['id'] ?? $place->id ?? '' }}">
									<button type="submit" class="add-cart-btn">
										<i class="fas fa-shopping-cart me-2"></i>Add to Cart
									</button>
								</form>
				</div>
			</div>
		@endforeach
	</div>
</div>

<!-- AOS Animation Library -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
	document.addEventListener('DOMContentLoaded', function() {
		AOS.init({
			duration: 800,
			easing: 'ease-in-out',
			once: true,
			offset: 100
		});
	});
</script>
@endsection
