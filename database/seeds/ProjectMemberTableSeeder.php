<?php

use Illuminate\Database\Seeder;
use ProjectRico\Entities\ProjectMember;

class ProjectMemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProjectMember::class, 100)->create();
    }
}
