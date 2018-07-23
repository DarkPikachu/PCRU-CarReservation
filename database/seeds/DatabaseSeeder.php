<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        //$this->call(CarTableSeeder::class);
        //$this->call(DriverTableSeeder::class);
        //$this->call(UserInfoTableSeeder::class);
        $this->call(PositionTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
    }
}
