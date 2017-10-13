<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('password');
        $admin->role = 0;
        $admin->save();


        $user = new User();
        $user->name = 'Ozaynaci';
        $user->email = 'ozaynaci@gmail.com';
        $user->password = bcrypt('password');
        $user->save();
    }
}
