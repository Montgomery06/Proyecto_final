<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Roman";
        $user->email = "romanale_6@hotmail.com";
        $user->password = bcrypt("secret");
        $user->role_id = 1;
        $user->save();

        $user = new User();
        $user->name = "Romanov";
        $user->email = "romanale@hotmail.com";
        $user->password = bcrypt("secret");
        $user->role_id = 2;
        $user->save();

    }

}
