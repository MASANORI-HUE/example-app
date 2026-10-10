<?php

namespace Database\Seeders;

use App\Models\Image;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tweet;
use Illuminate\Database\Seeder;

// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Str;

class TweetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('tweets')->insert([
        //     'user_id' => 1, // ← ここを追加
        //     'content' => Str::random(100),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // Tweet::factory()->count(10)->create();
        Tweet::factory()->count(10)->create()->each(fn (Tweet $tweet) => Image::factory()->count(4)->create()->each(fn (Image $image) => $tweet->images()->attach($image->id)
        )
        );
    }
}
