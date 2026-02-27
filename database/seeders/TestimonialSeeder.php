<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            'images/testimoni-1.png',
            'images/testimoni-2.png',
            'images/testimoni-3.png',
            'images/testimoni-4.png',
            'images/testimoni-5.png',
            'images/testimoni-6.png',
        ];

        foreach ($images as $image) {
            Testimonial::updateOrCreate(['image_path' => $image]);
        }
    }
}
