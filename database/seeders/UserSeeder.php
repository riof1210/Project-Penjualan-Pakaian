<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //membuat role admin
        $user = new User();
        $user->name = "Admin";
        $user->email = "admin@gmail.com";
        $user->password = Hash::make ("12345678");
        $user->save();
    }
}
