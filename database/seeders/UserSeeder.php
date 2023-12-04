<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $userModel = new \App\Models\User();
            $userModel->name = 'User ' . $i;
            $userModel->email = 'user' . $i . '@example.com';
            $userModel->password = \Illuminate\Support\Facades\Hash::make('password');
            $userModel->role_id = \App\Models\Role::all()->random()->id;
            $userModel->save();
        }
    }
}
