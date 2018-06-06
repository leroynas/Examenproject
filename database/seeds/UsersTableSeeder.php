<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'initials' => 'L.J.H.',
            'prefix' => 'De heer',
            'last_name' => 'Nas',
            'email' => 'leroynas119@gmail.com',
            'username' => 'leroy',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        ]);

        User::create([
            'initials' => 'P.H.D.',
            'prefix' => 'De heer',
            'last_name' => 'Norton',
            'email' => 'norton@toolsforever.nl',
            'username' => 'admin',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        ]);
    }
}
