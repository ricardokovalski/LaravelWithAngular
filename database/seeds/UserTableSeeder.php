<?php

use Illuminate\Database\Seeder;
use ProjectRico\Entities\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            
        factory(\ProjectRico\Entities\User::class)->create([
            'name' => 'ricardo.cruz',
            'email' => 'ricardokovalskicruz@gmail.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
        ]);
        
        factory(User::class, 10)->create();
    }
}
