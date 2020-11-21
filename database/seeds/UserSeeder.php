<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@kejarbahasa.com',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('admin');

        $kasir = User::create([
            'name' => 'user',
            'email' => 'user@kejarbahasa.com',
            'password' => bcrypt('12345678'),
        ]);

        $kasir->assignRole('user');
    }
}
