<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserRolesSeeder extends Seeder
{
    public function run()
    {
        $adminUser = User::where('name', 'Admin')->first();
        $guestUser = User::where('name', 'Guest')->first();

        $adminRole = Role::where('name', 'admin')->first();
        $guestRole = Role::where('name', 'guest')->first();

        if ($adminUser && $adminRole) {
            $adminUser->assignRole($adminRole);
        }

        if ($guestUser && $guestRole) {
            $guestUser->assignRole($guestRole);
        }
    }
}


