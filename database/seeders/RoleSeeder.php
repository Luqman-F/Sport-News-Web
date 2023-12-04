<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Admin',
            'Author',
            'User',
        ];

        foreach ($roles as $role) {
            $roleModel = new \App\Models\Role();
            $roleModel->role_name = $role;
            $roleModel->save();
        }
    }
}
