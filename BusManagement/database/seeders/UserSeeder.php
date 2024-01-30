<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Mazbaul Islam',
            'email' => 'mazbaul20@gmail.com',
            'phone_number' => '01711111111',
            'user_type' => 'admin',
            'password' => Hash::make('11111111'),
        ]);
    }
}
