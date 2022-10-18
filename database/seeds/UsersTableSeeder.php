<?php

use App\Models\User;
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
        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'phone'=>'0154040404',
            'user_type'=>'admin',
            'password'=>bcrypt('admin'),
            'resort_id'=>1,
        ]);
    }
}
