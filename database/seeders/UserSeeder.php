<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'name' => 'Enrique Sousa',
            'email' => 'enrique.sousa@gmail.com',
            'password' => bcrypt('sousa1234'),
        ]);

        User::factory(10)->create();
    }
}
