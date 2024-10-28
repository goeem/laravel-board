<?php

namespace Database\Seeders;
use App\Models\Interest;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    Interest::create(['name' => 'Technology']);
    Interest::create(['name' => 'Art']);
    Interest::create(['name' => 'Science']);
}
}
