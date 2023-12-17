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
    public function run(): void
    {
        $adminModel = new \App\Models\User();
        $adminModel->name = 'Admin';
        $adminModel->email = 'admin@example.com';
        $adminModel->password = 'password';
        $adminModel->role_id = \App\Models\Role::where('role_name', 'admin')->first()->id;
        $adminModel->save();

        $journalistModel = new \App\Models\User();
        $journalistModel->name = 'Journalist';
        $journalistModel->email = 'journalist@example.com';
        $journalistModel->password = 'password';
        $journalistModel->role_id = \App\Models\Role::where('role_name', 'journalist')->first()->id;
        $journalistModel->save();

        User::factory(25)->create();
    }
}
