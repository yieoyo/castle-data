<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create(['name' => 'John Doe', 'email' => 'admin@tyrostudio.com', 'password' => bcrypt('secret'), 'role' => 'admin']);
        User::create(['name' => 'Mr Bean', 'email' => 'bean@tyrostudio.com', 'password' => bcrypt('secret'), 'role' => 'user']);
        User::create(['name' => 'Homosapiens', 'email' => 'sapeins@tyrostudio.com', 'password' => bcrypt('secret'), 'role' => 'user']);
    }
}
