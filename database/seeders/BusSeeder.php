<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bus;

class BusSeeder extends Seeder
{
    public function run()
    {
        Bus::create([
            'from' => 'Dhaka',
            'to' => 'Chittagong',
            'date' => null,
            'departure_time' => '08:00:00',
            'bus_class' => 'AC',
            'total_seats' => 40,
            'fare' => 750,
            'operator_name' => 'Hanif Enterprise',
            'recurring' => true,
        ]);

        Bus::create([
            'from' => 'Dhaka',
            'to' => 'Sylhet',
            'date' => null,
            'departure_time' => '10:30:00',
            'bus_class' => 'Sleeper',
            'total_seats' => 30,
            'fare' => 900,
            'operator_name' => 'Green Line',
            'recurring' => true,
        ]);

        Bus::create([
            'from' => 'Dhaka',
            'to' => 'Cox’s Bazar',
            'date' => null,
            'departure_time' => '07:00:00',
            'bus_class' => 'Non-AC',
            'total_seats' => 45,
            'fare' => 550,
            'operator_name' => 'Shyamoli',
            'recurring' => true,
        ]);
    }
}


