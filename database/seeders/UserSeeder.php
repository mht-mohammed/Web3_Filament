<?php

namespace Database\Seeders;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::Create([
            "name" => "Admin User",
            "email" => "admin@gmail.com",
            "password" => Hash::make("123456789"),
            "type" => "admin", 

        ]);
        User::Create([
            "name" => "Manager User",
            "email" => "manager@gmail.com",
            "password" => Hash::make("123456789"),
            "type" => "manager", 

        ]);
        User::Create([
            "name" => "Normal User",
            "email" => "user@gmail.com",
            "password" => Hash::make("123456789"),
            "type" => "user", 

        ]);
    }
}
