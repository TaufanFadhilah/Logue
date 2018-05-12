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
          'name' => "Panitia",
          'email' => 'panitia@logue.fun',
          'password' => bcrypt("password"),
          'gender' => 'Male',
          'birthday' => '1990-09-09',
          'phone' => '0812519923',
          'address' => 'Jl. Telekomunikasi, Bandung',
          'photo' => 'avatars/default.png',
          'role' => 'Committee',
        ]);
    }
}
