<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        Role::create(['name' => 'manager']);
        Role::create(['name' => 'author']);
        Role::create(['name' => 'admin']);
    }
}
