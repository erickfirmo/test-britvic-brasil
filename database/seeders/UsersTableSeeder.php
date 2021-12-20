<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Models\User;
        $user->name = 'Erick Firmo';
        $user->email = 'erickfirmo1996@gmail.com';
        $user->email_verified_at = now();
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password,
        $user->remember_token = Str::random(10);
        $user->save();

        $user = new \App\Models\User;
        $user->name = 'Arthur Samarcos';
        $user->email = 'arthur.samarcos.ext@ebba.com.br';
        $user->email_verified_at = now();
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password,
        $user->remember_token = Str::random(10);
        $user->save();

        $user = new \App\Models\User;
        $user->name = 'Rafael Carvalho';
        $user->email = 'Rafael.Carvalho@britvic.com';
        $user->email_verified_at = now();
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password,
        $user->remember_token = Str::random(10);
        $user->save();
    }
}
