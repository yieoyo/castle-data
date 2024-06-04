<?php

namespace Database\Seeders;

use App\Models\Fiscal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FiscalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Fiscal::factory(100)->create();
    }
}
