<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Suscripcion;
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
        $this->suscripciones();
        $this->users();
    }
    public function role()
    {
        $gerente = Role::create(['name' => 'Gerente']);
        Permission::create(['name' => 'admin'])->syncRoles([$gerente]);


    }

    public function suscripciones(){
        Suscripcion::create([
            'nombre' => 'Plan Basico',
            'precio' => 1,
            'stripe_id' => 'price_1OJTfHJrLfX1VoDJWE4uOVib',
            'foto' => 'https://scontent.fsrz1-2.fna.fbcdn.net/v/t39.30808-6/306696242_2022526374615946_5961266096114267716_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=c83dfd&_nc_ohc=8-mbKNO71pcAX8DFHZg&_nc_ht=scontent.fsrz1-2.fna&oh=00_AfBwDsCf03J0TZbTFD27CTsGhQjDH1K8IA-lHykmsCXqAw&oe=6572BB51',
        ]);

        Suscripcion::create([
            'nombre' => 'Plan Pro',
            'precio' => 5,
            'stripe_id' => 'price_1OJTfHJrLfX1VoDJYCUSCTeS',
            'foto' => 'https://www.ge2.co/wp-content/uploads/2018/09/plan_premium_sanitas.jpg',
        ]);
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
