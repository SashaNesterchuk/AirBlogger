<?php

use Illuminate\Database\Seeder;

class BloggerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bloggers = factory(\App\Blogger::class, 6)->create();


    }
}
