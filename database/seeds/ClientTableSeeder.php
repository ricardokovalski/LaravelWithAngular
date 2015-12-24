<?php

use Illuminate\Database\Seeder;
use ProjectRico\Client;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::truncate();
        factory(Client::class, 10)->create();
    }
}
