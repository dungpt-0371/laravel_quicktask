<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateInitialAdminAccount extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::unguard(); // Truyen du lieu khong bi anh huong boi ...

        $admin = User::create(
            [
                'email' => 'admin.account@sun-asterisk.com',
                'email_verified_at' => now(),
                'password' => bcrypt('12345678'),
                'first_name' => 'admin',
                'last_name' => 'account',
                'is_active' => true,
                'is_admin' => true,
                'username' => 'admin-account',
            ]
        );
    }
}
