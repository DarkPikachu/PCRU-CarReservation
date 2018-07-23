<?php

use Illuminate\Database\Seeder;

class UserInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $userInfo = [
            'id' => 1, 
            'first_name' => 'ศุภณัฐ',
            'last_name' => 'วิสุงเร',
            'position' => 1,
            'department' => 2,
            'permission' => 1           
        ];
        \App\UserInfo::create($userInfo);
    }
}
