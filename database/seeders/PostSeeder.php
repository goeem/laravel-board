<?php

namespace Database\Seeders;
use App\Models\Post;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    Post::create([
        'title' => 'Latest in Tech',
        'content' => 'Here is some tech content...',
        'user_id' => 1, // Assuming user 1 exists
        'interest_id' => 1, // Technology
    ]);
}
}
