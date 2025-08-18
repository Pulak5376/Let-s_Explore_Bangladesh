<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    public function run()
    {
        $hotels = [
            [
                'name' => 'Pan Pacific Sonargaon',
                'location' => 'Dhaka',
                'description' => 'Luxury 5-star hotel in the heart of Dhaka with world-class amenities.',
                'price_per_night' => 15000,
                'rating' => 4.8,
                'image_url' => 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/244895567.jpg?k=db31da9f0af84712be55b53dd7b5e9c64ce8c57cdd25c4c56ad83d3c9631d17b&o=&hp=1',
                'available_rooms' => 50
            ],
            [
                'name' => 'Royal Tulip Sea Pearl Beach Resort',
                'location' => "Cox's Bazar",
                'description' => 'Beachfront luxury resort with private beach access and stunning sea views.',
                'price_per_night' => 12000,
                'rating' => 4.7,
                'image_url' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1c/d5/e8/5a/royal-tulip-sea-pearl.jpg?w=700&h=-1&s=1',
                'available_rooms' => 40
            ],
            [
                'name' => 'Grand Sultan Tea Resort',
                'location' => 'Sreemangal',
                'description' => 'Surrounded by tea gardens, offering a unique blend of luxury and nature.',
                'price_per_night' => 8000,
                'rating' => 4.6,
                'image_url' => 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/194031574.jpg?k=9cc145504aed4a767785c4f1f01c1642c1a0c39b2a955e4f2842e003514a6393&o=&hp=1',
                'available_rooms' => 30
            ],
            [
                'name' => 'Sayeman Beach Resort',
                'location' => "Cox's Bazar",
                'description' => 'Classic beachfront hotel with modern amenities and ocean view rooms.',
                'price_per_night' => 7000,
                'rating' => 4.5,
                'image_url' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/15/9d/e7/ac/sayeman-beach-resort.jpg?w=700&h=-1&s=1',
                'available_rooms' => 45
            ],
            [
                'name' => 'Renaissance Dhaka Gulshan Hotel',
                'location' => 'Dhaka',
                'description' => 'Modern luxury hotel in the diplomatic zone with rooftop pool.',
                'price_per_night' => 14000,
                'rating' => 4.7,
                'image_url' => 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/190064164.jpg?k=6a8b5e2c3c3c3d6e3f5e3c3d6e3f5e3c3d6e3f5e3c3d6e3f5e3c3d6e3f5e3c&o=&hp=1',
                'available_rooms' => 35
            ],
            [
                'name' => 'Long Beach Hotel',
                'location' => "Cox's Bazar",
                'description' => 'Elegant beachfront hotel with panoramic ocean views.',
                'price_per_night' => 6000,
                'rating' => 4.4,
                'image_url' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/06/32/5f/51/long-beach-hotel.jpg?w=700&h=-1&s=1',
                'available_rooms' => 55
            ],
            [
                'name' => 'Radisson Blu Chattogram Bay View',
                'location' => 'Chittagong',
                'description' => 'Upscale hotel with bay views and international dining options.',
                'price_per_night' => 11000,
                'rating' => 4.6,
                'image_url' => 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/68430728.jpg?k=6a8b5e2c3c3c3d6e3f5e3c3d6e3f5e3c3d6e3f5e3c3d6e3f5e3c3d6e3f5e3c&o=&hp=1',
                'available_rooms' => 40
            ],
            [
                'name' => 'Nazimgarh Resort',
                'location' => 'Sylhet',
                'description' => 'Luxury resort surrounded by tea gardens and natural beauty.',
                'price_per_night' => 9000,
                'rating' => 4.5,
                'image_url' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/07/44/d1/5c/nazimgarh-resort.jpg?w=700&h=-1&s=1',
                'available_rooms' => 25
            ],
            [
                'name' => 'Mermaid Beach Resort',
                'location' => "Cox's Bazar",
                'description' => 'Eco-friendly beach resort with private villas and sustainable practices.',
                'price_per_night' => 13000,
                'rating' => 4.8,
                'image_url' => 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/234185616.jpg?k=6a8b5e2c3c3c3d6e3f5e3c3d6e3f5e3c3d6e3f5e3c3d6e3f5e3c3d6e3f5e3c&o=&hp=1',
                'available_rooms' => 20
            ],
            [
                'name' => 'The Palace Luxury Resort',
                'location' => 'Habiganj',
                'description' => 'Premium resort with golf course and extensive leisure facilities.',
                'price_per_night' => 16000,
                'rating' => 4.9,
                'image_url' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1a/37/c7/9c/the-palace-luxury-resort.jpg?w=700&h=-1&s=1',
                'available_rooms' => 30
            ]
        ];

        foreach ($hotels as $hotel) {
            Hotel::create($hotel);
        }
    }
}
