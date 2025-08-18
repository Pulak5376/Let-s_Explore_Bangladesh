<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminUserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TransportSeeder::class,
        ]);
        $this->call([
            FlightsSeeder::class,
        ]);
       $this->call(AdminUserSeeder::class);
       $this->call(GallerySeeder::class);
       
    }
}
