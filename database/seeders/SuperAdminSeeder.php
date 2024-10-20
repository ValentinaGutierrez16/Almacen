<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $user = User::create([
            'name' => 'Angie',
            'email' => 'angie@gmail.com',
            'password' => bcrypt('angie'), // Cambia por tu contraseña
        ]);

        // Asigna el rol de superadmin
        $role = Role::firstOrCreate(['name' => '>super_admin']);
        $user->assignRole($role);
}
}