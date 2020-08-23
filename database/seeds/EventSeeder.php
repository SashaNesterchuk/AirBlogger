<?php

use App\Models\Blogger;
use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Event::class, 200)->create()->each(function ($event) {
            $bloggers = Blogger::all()->random(rand(2, 5));

            $count = 1;

            foreach ($bloggers as $blogger)
            {
                $blogger->events()->attach($event, array('blogger_order' => $count++));
            }
        });
    }
}
