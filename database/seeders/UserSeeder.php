<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'role' => 'admin',
            'name' => 'app admin',
            'phone' => '080123456789',
            'email' => 'admin@app.com',
            'username' => 'admin',
            'password' => 123456
        ]);

        User::factory(5)->create();
    }
}
