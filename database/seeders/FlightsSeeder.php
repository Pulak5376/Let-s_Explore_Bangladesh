<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FlightsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('flights')->insert([
            [
                'flight_number' => 'BG101',
                'airline' => 'Biman Bangladesh',
                'from' => 'Dhaka',
                'to' => "Cox's Bazar",
                'departure_date' => Carbon::now()->addDays(2)->toDateString(),
                'arrival_date' => Carbon::now()->addDays(2)->toDateString(),
                'class' => 'Economy',
                'seats_available' => 30,
                'price' => 4500.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'flight_number' => 'US202',
                'airline' => 'US-Bangla Airlines',
                'from' => 'Dhaka',
                'to' => 'Chittagong',
                'departure_date' => Carbon::now()->addDays(3)->toDateString(),
                'arrival_date' => Carbon::now()->addDays(3)->toDateString(),
                'class' => 'Business',
                'seats_available' => 10,
                'price' => 7000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'flight_number' => 'NOV303',
                'airline' => 'Novoair',
                'from' => 'Dhaka',
                'to' => 'Sylhet',
                'departure_date' => Carbon::now()->addDays(4)->toDateString(),
                'arrival_date' => Carbon::now()->addDays(4)->toDateString(),
                'class' => 'First Class',
                'seats_available' => 5,
                'price' => 12000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'flight_number' => 'BG104',
                'airline' => 'Biman Bangladesh',
                'from' => "Cox's Bazar",
                'to' => 'Dhaka',
                'departure_date' => Carbon::now()->addDays(5)->toDateString(),
                'arrival_date' => Carbon::now()->addDays(5)->toDateString(),
                'class' => 'Economy',
                'seats_available' => 25,
                'price' => 4500.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

