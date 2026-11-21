<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        AdminUser::updateOrCreate(
            ['email' => 'admin@astrol.local'],
            ['name' => 'Site Administrator', 'password' => 'Admin@12345']
        );
    }
}
