<?php

use App\Models\Blogger;
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
        factory(Blogger::class, 15)->create();
    }
}
