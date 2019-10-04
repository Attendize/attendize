<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //administrator
        $user_data['email'] = 'digital.tps2018@gmail.com';
        $user_data['first_name'] = "digital";
        $user_data['last_name'] = "tps";

        $user_data['password'] = Hash::make("qazwsx12");
        $user_data['account_id'] = 0;
        $user_data['is_admin'] = 1;
        $user_data['is_registered'] = 1;
        $user = User::create($user_data);
    }
}
