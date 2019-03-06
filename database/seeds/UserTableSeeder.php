<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		for($i = 1;$i <= 3; $i++){
			\App\User::create(['name' => 'User'.$i, 'email' => 'user'.$i.'@gmail.com', 'password' => bcrypt('123456')]);
		}
    }
}
