<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\User::insert([
            'name' => 'Admin',
            'email' => 'admin@example.org',
            'password' => bcrypt('12345'),
            'role' => 1,
            'birthday' => '1990-11-5',
            'avatar' => 'avatar.png',
            'remember_token' => str_random(10),
        ]);
        factory(App\Models\User::class, 10)->create();
    }
}
