<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminOnlySeeder extends Seeder
{
    public function run(): void
    {
        Role::findOrCreate('Admin', 'web');

        $admin = User::firstOrCreate(
            ['email' => 'admin@kusaytech.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('Admin123!'),
                'is_active' => true,
            ]
        );

        $admin->syncRoles(['Admin']);
    }
}
