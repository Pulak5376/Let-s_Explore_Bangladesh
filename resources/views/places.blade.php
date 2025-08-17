
@extends('layouts.app')

@section('title', 'Explore Places')
@section('content')
<div class="container" style="max-width:1200px; margin:40px auto;">
	<h2 style="text-align:center; margin-bottom:32px;">Explore Beautiful Places in Bangladesh</h2>
	<div class="places-grid" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(320px,1fr)); gap:32px;">
		@foreach($places as $place)
			<div class="place-card" style="background:#fff; border-radius:12px; box-shadow:0 2px 12px #eee; overflow:hidden; display:flex; flex-direction:column;">
				<img src="{{ $place['image_path'] ?? '' }}" alt="{{ $place['name'] ?? '' }}" style="width:100%; height:220px; object-fit:cover;">
				<div style="padding:20px; flex:1; display:flex; flex-direction:column;">
					<h3 style="margin:0 0 10px 0; color:#00695c; font-size:1.4rem;">{{ $place['name'] ?? '' }}</h3>
					<div style="color:#888; font-size:1rem; margin-bottom:10px;">📍 {{ $place['location'] ?? '' }}</div>
					<div style="font-size:1.08rem; color:#333; margin-bottom:12px;">{{ $place['description'] ?? '' }}</div>
					<div style="margin-top:auto; display:flex; justify-content:space-between; align-items:center;">
						<span style="font-weight:600; color:#ff6b35;">৳{{ $place['price'] ?? '' }}</span>
						<span style="background:#e0f7fa; color:#00695c; border-radius:16px; padding:4px 12px; font-size:0.95rem;">{{ $place['day'] ?? '' }} days, {{ $place['person'] ?? '' }} persons</span>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>
@endsection
