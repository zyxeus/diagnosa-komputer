<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        if (!Admin::where('email', 'zyxeus@gmail.com')->exists()) {
            Admin::create([
                'name' => 'zyxeus',
                'email' => 'zyxeus@gmail.com',
                'password' => Hash::make('123'),
            ]);
        }
    }
}
