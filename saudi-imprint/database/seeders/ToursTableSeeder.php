<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories;
use App\Models\Tour;
use App\Models\User;

class ToursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        //  // Create 10 fake tours
        // Tour::factory()->count(10)->create();
        
        DB::table('tours')->insert([
            [
                'name' => 'Desert Safari',
                'description' => 'Experience the thrill of the Desert Safari, where adventure meets breathtaking landscapes. 
                Embark on an unforgettable journey through golden dunes, enjoy exhilarating dune bashing, and witness a stunning desert sunset.
                 Immerse yourself in the rich culture with traditional Bedouin hospitality, camel rides, and live entertainment. Whether you seek excitement or relaxation,
                  this desert adventure promises a truly memorable experience',
                'price' => 100,
                'type_of_tour' => json_encode(['Adventure', 'Culture']),
                'duration' => 4, // 4 hours
                'max_participants' => 10,
                'active' => true,
                'image_path' => 'assets/img/Guided tours/Desert Safari.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                //لازم يتغير الي تحت
                'location' => fake()->city(),
                'included' => implode(', ', fake()->words(5)),
                'date' => fake()->dateTimeBetween('now', '+1 year'),
                'user_id' => '1'
            ],
            [
                'name' => 'Hike In The Riyadh Desert',
                'description' => "Escape the city's hustle and immerse yourself in the breathtaking landscapes of the Riyadh desert on this one-hour guided hike. Traverse golden dunes and rocky trails as you witness the stunning contrast between vast open spaces and rugged terrain. Along the way, learn about the region’s unique geology, native wildlife, and rich Bedouin heritage. Whether you're a nature enthusiast
                 or just seeking a refreshing outdoor adventure, this short yet unforgettable journey promises scenic views, fresh desert air, and a true taste of Saudi Arabia’s natural beauty.",
                'price' => 70,
                'type_of_tour' => json_encode(['Hiking', 'Nature']),
                'duration' => 1, 
                'max_participants' => 15,
                'active' => true,
                'image_path' => 'assets/img/Guided tours/hike.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Um Alhesh Lake',
                'description' => "Hidden within the vast dunes of the Empty Quarter, Um Alhesh Lake is a rare natural wonder in one of the most extreme deserts on Earth.
                 This seasonal lake emerges after heavy rainfall, creating a breathtaking contrast between golden sand dunes and shimmering water. Surrounded by untouched landscapes, it offers a unique opportunity for visitors to witness the raw beauty of the Arabian desert. Whether you're a nature enthusiast, photographer, or adventure seeker, Um Alhesh Lake provides a surreal and unforgettable experience in the heart of the Rub' al Khali.",
                'price' => 150,
                'type_of_tour' => json_encode(['Adventure', 'Nature']),
                'duration' => 4, // 4 hours
                'max_participants' => 10,
                'active' => true,
                'image_path' => 'assets/img/Guided tours/um alhesh.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Camping Adventure',
                'description' => "Escape the city's hustle and immerse yourself in the serene beauty of Riyadh’s desert with an unforgettable camping adventure. Enjoy a night under the stars surrounded by golden dunes, where you’ll experience traditional Saudi hospitality, a cozy bonfire, and a delicious barbecue dinner. Engage in exciting activities like dune bashing, sandboarding, and stargazing. Whether you're seeking adventure or relaxation, this camping trip offers the perfect blend of nature, culture, and thril",
                'price' => 250,
                'type_of_tour' => json_encode(['Adventure', 'Culture', 'Camping']),
                'duration' => 6,
                'max_participants' => 10,
                'active' => true,
                'image_path' => 'assets/img/Guided tours/Desert Safari.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
