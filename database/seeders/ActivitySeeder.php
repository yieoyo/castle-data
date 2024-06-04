<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;

class ActivitySeeder extends Seeder
{
    public function run()
    {
        Activity::factory()->count(100)->create();
    }
}
