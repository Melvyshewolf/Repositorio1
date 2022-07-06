<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Melany Arancibia',
            'email' => 'melanyarancibia@gmail.com',
            'password' => bcrypt('123456')
        ])->assignRole('Administrador');

        $modelos = User::factory(10)->create();
    
        foreach ($modelos as $modelo) {
            $modelo->assignRole('Modelo');
            $modelo->events()->attach(rand(1,5));   
        };    

    }
}
