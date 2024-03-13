<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Super Admin User
        $superAdmin = User::create([
            'name' => 'Gevann Mullins', 
            'email' => 'gevann.mullins@gmail.com',
            'password' => Hash::make('superadmin')
        ]);
        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $admin = User::create([
            'name' => 'Gev Mul', 
            'email' => 'gev.mul@gmail.com',
            'password' => Hash::make('admin')
        ]);
        $admin->assignRole('Admin');

    }
}
