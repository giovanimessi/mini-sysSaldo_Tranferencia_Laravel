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

        User::create([
            'name' => "Giovani Moura Messia",
            'email' => 'giovanimouradev@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        
        User::create([
            'name' => "Moura Messia",
            'email' => 'email@email.com',
            'password' => bcrypt('123456'),
        ]);



    }
}
