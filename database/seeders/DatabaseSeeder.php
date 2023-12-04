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
        $this->users();
    }
    public function role()
    {
        $gerente = Role::create(['name' => 'Gerente']);
        Permission::create(['name' => 'admin'])->syncRoles([$gerente]);


    }

    public function users(){

        $user = new User();
        $user->name = "Julio Suarez";
        $user->email = "julio.suarez91@gmail.com";
        $user->password = bcrypt('password');
        $user->stripe_id = 'cus_P7jVKCPwDursvN';
        $user->assignRole('Gerente');
        $user->save();

        $user = new User();
        $user->name = "Cristian Cuellar ";
        $user->email = "admin@gmail.com";
        $user->password = bcrypt('12345678');
        $user->stripe_id = 'cus_P4yGqDLT3CSoyJ';
        $user->assignRole('Gerente');
        $user->save();

        $user = new User();
        $user->name = "Gabriel Mercado ";
        $user->email = "gabriel@gmail.com";
        $user->password = bcrypt('12345678');
        $user->stripe_id = 'cus_P4z0sgrox7qZg8';
        $user->assignRole('Gerente');
        $user->save();
    }
}
