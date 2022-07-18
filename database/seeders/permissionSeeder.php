<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class permissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permission::create(['name' => 'post', 'guard_name' => 'web']);
        // Permission::create(['name' => 'category', 'guard_name' => 'web']);
        // Permission::create(['name' => 'room', 'guard_name' => 'web']);
        // Permission::create(['name' => 'floor', 'guard_name' => 'web']);
        // Permission::create(['name' => 'building', 'guard_name' => 'web']);
        // Permission::create(['name' => 'collage-time-table', 'guard_name' => 'web']);
        Permission::create(['name' => 'permission', 'guard_name' => 'web']);
        Permission::create(['name' => 'users', 'guard_name' => 'web']);

    }
}
