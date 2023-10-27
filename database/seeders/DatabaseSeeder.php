<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\RoleModel;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        RoleModel::create([
            'slug' => 'admin',
            'label' => 'Administrator',
        ]);

        RoleModel::create([
            'slug' => 'kataloger',
            'label' => 'Kataloger',
        ]);

        RoleModel::create([
            'slug' => 'pegawai',
            'label' => 'Pegawai',
        ]);

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'role_id' => 1,
            'password' => 'password',
        ]);

        User::create([
            'name' => 'Kataloger',
            'email' => 'kataloger@gmail.com',
            'role_id' => 2,
            'password' => 'password',
        ]);

        User::create([
            'name' => 'Pegawai',
            'email' => 'pegawai@gmail.com',
            'role_id' => 3,
            'password' => 'password',
        ]);
    }
}
