<?php
namespace Tests\Feature\event\utils;

use App\Blogger;
use App\Event;

trait CreateEvents
{
    public function createEvents($year)
    {
        factory(Blogger::class, 10)->create();

        factory(Event::class, 3)->create([
            'event_date' => $year
        ])->each(function ($event) {
            $bloggers = \App\Blogger::all()->random(4);

            $count = 1;

            foreach ($bloggers as $blogger) {
                $blogger->events()->attach($event, array('blogger_order' => $count++));
            }
        });
    }
}
