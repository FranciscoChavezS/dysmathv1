<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       $user= User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('administrador')
        ]);
        //metodo por permissions
        $user->assignRole('Admin');
        User::factory(10)->create();
    }
}
