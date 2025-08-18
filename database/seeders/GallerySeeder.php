<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleries = [
            [
                'title' => 'Sundarbans Mangrove Forest',
                'location' => 'Khulna, Bangladesh',
                'description' => 'The largest mangrove forest in the world, home to the Bengal tiger and numerous wildlife species.',
                'image_url' => 'images/galleries/sundarbans.jpg',
            ],
            [
                'title' => 'Cox\'s Bazar Beach',
                'location' => 'Cox\'s Bazar, Chittagong',
                'description' => 'The world\'s longest natural sandy sea beach stretching over 120 kilometers along the Bay of Bengal.',
                'image_url' => 'images/galleries/coxsbazar.jpg',
            ],
            [
                'title' => 'Ahsan Manzil Pink Palace',
                'location' => 'Dhaka, Bangladesh',
                'description' => 'The official residence of the Nawab of Dhaka, now a museum showcasing the rich history of Bangladesh.',
                'image_url' => 'images/galleries/ahsan_manzil.jpg',
            ],
            [
                'title' => 'Lalbagh Fort',
                'location' => 'Old Dhaka, Bangladesh',
                'description' => 'A 17th century Mughal fort complex with beautiful gardens and historic architecture.',
                'image_url' => 'images/galleries/lalbagh_fort.jpg',
            ],
            [
                'title' => 'Saint Martin\'s Island',
                'location' => 'Teknaf, Cox\'s Bazar',
                'description' => 'The only coral island in Bangladesh, known for its crystal clear waters and coral reefs.',
                'image_url' => 'images/galleries/saint_martins.jpg',
            ],
            [
                'title' => 'Srimangal Tea Gardens',
                'location' => 'Moulvibazar, Sylhet',
                'description' => 'Rolling hills covered with lush green tea plantations, offering breathtaking scenic views.',
                'image_url' => 'images/galleries/srimangal_tea.jpg',
            ],
            [
                'title' => 'Ratargul Swamp Forest',
                'location' => 'Sylhet, Bangladesh',
                'description' => 'The only swamp forest in Bangladesh, flooded during monsoon season creating a magical landscape.',
                'image_url' => 'images/galleries/ratargul.jpg',
            ],
            [
                'title' => 'Paharpur Buddhist Monastery',
                'location' => 'Naogaon, Rajshahi',
                'description' => 'UNESCO World Heritage site featuring ancient Buddhist monastery ruins from the 8th century.',
                'image_url' => 'images/galleries/paharpur.jpg',
            ],
            [
                'title' => 'Kuakata Sea Beach',
                'location' => 'Patuakhali, Barisal',
                'description' => 'Panoramic sea beach where you can see both sunrise and sunset from the same spot.',
                'image_url' => 'images/galleries/kuakata.jpg',
            ],
            [
                'title' => 'Bandarban Hill Tracts',
                'location' => 'Bandarban, Chittagong',
                'description' => 'Mountainous region with indigenous communities, waterfalls, and the highest peak Keokradong.',
                'image_url' => 'images/galleries/bandarban.jpg',
            ],
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}
