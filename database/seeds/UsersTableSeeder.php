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
        $user1 = [
            'name' => 'Supanut Wisungre',
            'email' => 'supanut@pcru.ac.th',
            'password' => Hash::make('takachi')
        ];

        User::create($user1);
    }
}
