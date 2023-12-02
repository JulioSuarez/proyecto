<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->role();
    }
    public function role()
    {
        $gerente = Role::create(['name' => 'Gerente']);
        Permission::create(['name' => 'admin'])->syncRoles([$gerente]);


        $user = new User();
        $user->name = "Julio Suarez";
        $user->email = "julio.suarez91@gmail.com";
        $user->password = bcrypt('password');
        $user->assignRole('Gerente');
        $user->save();

        $user = new User();
        $user->name = "Cristian Cuellar ";
        $user->email = "admin@gmail.com";
        $user->password = bcrypt('12345678');
        $user->assignRole('Gerente');
        $user->save();
    }
}
