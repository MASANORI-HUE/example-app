<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

// use Swatty007\FakerImageGenerator\Provider\FakerImageGenerationProvider;

/**
 * @extends Factory<Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // ディレクトリがなければ作成する
        if (! Storage::disk('public')->exists('images')) {
            Storage::disk('public')->makeDirectory('images');
        }
        // $faker = \Faker\Factory::create();
        // $faker->addProvider(new FakerImageGenerationProvider($faker));
        // $imagePath = $faker->imageGenerator();
        // return [
        //     'name' => basename($imagePath),
        // ];

        $fileName = uniqid().'.png';
        // 1ピクセルのダミー画像バイナリを storage/app/public/images/ 配下に直接保存
        Storage::disk('public')->put(
            'images/'.$fileName,
            base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=')
        );

        return [
            'name' => $fileName,
        ];
    }
}
