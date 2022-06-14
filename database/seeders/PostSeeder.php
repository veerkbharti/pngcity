<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $post = new Post();
        $post->post_title = $faker->sentence(10);
        $post->category = implode(",", $faker->words(3));
        $post->post_content = '<p>Vishva Bal shram nishedh Divas PNG</p>';
        $post->thumbnail = 'Vishva-Bal-shram-nishedh-Divas.jpg';
        $post->post_slug = $faker->slug();
        $post->post_tags = 'Vishva Bal shram nishedh, Divas Vishva Bal shram nishedh, Divas PNG World day against child labour, World day against child labour PNG, child labour PNG, child labour day png';
        $post->search_keywords = 'vishva-bal-shram-nishedh-divas-dgfjhr';
        $post->post_views = $faker->numberBetween($min = 100, $max = 999);
        $post->download_count = $faker->numberBetween($min = 100, $max = 999);
        $post->post_likes = $faker->numberBetween($min = 100, $max = 999);
        $post->post_shares = $faker->numberBetween($min = 100, $max = 999);
        $post->meta_title = 'Vishva Bal shram nishedh Divas PNG';
        $post->meta_description = 'Vishva Bal shram nishedh Divas PNG';
        $post->meta_keywords = 'Vishva Bal shram nishedh, Divas Vishva Bal shram nishedh, Divas PNG World day against child labour, World day against child labour PNG, child labour PNG, child labour day png';
        $post->png_file_size = $faker->numberBetween($min = 10000, $max = 999999);
        $post->png_width = $faker->numberBetween($min = 100, $max = 9999);
        $post->png_height = $faker->numberBetween($min = 100, $max = 9999);
        $post->png_mime_type = 'image/png';
        $post->png_file_path = 'Vishva-Bal-shram-nishedh-Divas.png';

        $post->post_author = $faker->randomDigitNot(0);
        $post->save();
    }
}
