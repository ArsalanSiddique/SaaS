<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User; 

class CreateSuperAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Arsalan Ahmed', 
            'email' => 'arsalan@test.com',
            'password' => bcrypt('password123')
        ]);

        $role = Role::where('name', 'super-admin')->first();
        $user->assignRole([$role->id]);
    }
}
