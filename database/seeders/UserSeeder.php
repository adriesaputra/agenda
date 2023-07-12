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
        $user = User::create([
            'name' => 'Adrie Saputra',
            'email' => 'admin@skripsicenter.com',
            'password' => bcrypt('12345678'),
            'is_admin' => 1,
            'phone' => '081268208389',
        ]);
    }
}
