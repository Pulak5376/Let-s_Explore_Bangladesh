<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transport;

class TransportSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // Buses
            [
                'name' => 'GreenLine',
                'type' => 'bus',
                'route_from' => 'Dhaka',
                'route_to' => 'Chittagong',
                'departure_time' => '08:00:00',
                'price' => 800.00,
                'total_seats' => 40,
            ],
            [
                'name' => 'Shyamoli',
                'type' => 'bus',
                'route_from' => 'Dhaka',
                'route_to' => 'Sylhet',
                'departure_time' => '09:30:00',
                'price' => 600.00,
                'total_seats' => 35,
            ],
            [
                'name' => 'Soudia',
                'type' => 'bus',
                'route_from' => 'Dhaka',
                'route_to' => 'Rajshahi',
                'departure_time' => '07:45:00',
                'price' => 550.00,
                'total_seats' => 30,
            ],
            [
                'name' => 'Hanif',
                'type' => 'bus',
                'route_from' => 'Chittagong',
                'route_to' => 'Dhaka',
                'departure_time' => '15:00:00',
                'price' => 850.00,
                'total_seats' => 40,
            ],
            [
                'name' => 'Eagle Express',
                'type' => 'bus',
                'route_from' => 'Dhaka',
                'route_to' => 'Khulna',
                'departure_time' => '13:30:00',
                'price' => 700.00,
                'total_seats' => 38,
            ],

            // Trains
            [
                'name' => 'Subarna Express',
                'type' => 'train',
                'route_from' => 'Dhaka',
                'route_to' => 'Rajshahi',
                'departure_time' => '06:00:00',
                'price' => 450.00,
                'total_seats' => 200,
            ],
            [
                'name' => 'Padma Express',
                'type' => 'train',
                'route_from' => 'Dhaka',
                'route_to' => 'Khulna',
                'departure_time' => '10:00:00',
                'price' => 420.00,
                'total_seats' => 180,
            ],
            [
                'name' => 'Chitra Express',
                'type' => 'train',
                'route_from' => 'Dhaka',
                'route_to' => 'Khulna',
                'departure_time' => '14:30:00',
                'price' => 400.00,
                'total_seats' => 180,
            ],
            [
                'name' => 'Mohanagar Express',
                'type' => 'train',
                'route_from' => 'Dhaka',
                'route_to' => 'Chittagong',
                'departure_time' => '07:00:00',
                'price' => 500.00,
                'total_seats' => 220,
            ],
            [
                'name' => 'Rangpur Express',
                'type' => 'train',
                'route_from' => 'Dhaka',
                'route_to' => 'Rangpur',
                'departure_time' => '16:45:00',
                'price' => 480.00,
                'total_seats' => 210,
            ],
        ];

        foreach ($data as $transport) {
            Transport::create($transport);
        }
    }
}
