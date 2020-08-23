<?php

namespace Tests\Feature;

use App\Blogger;
use App\Event;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\event\utils\CreateEvents;
use Tests\TestCase;

class UpdateEventTest extends TestCase
{
    use DatabaseMigrations, CreateEvents;

    protected function setUp(): void
    {
        parent::setUp();

        $this->createEvents(Carbon::now());
    }

    /**
     * @test
     * @group Fix
     */
    public function it_must_increment_decrement_in_event_blogger_order()
    {
        $event = Event::with('bloggers')->first();

        $firstBlogger = $event->bloggers[0];

        $secondBlogger = $event->bloggers[1];

        $response = $this->updateEvent([
            'event' => $event->id,
            'decrement_id' => $secondBlogger->id,
            'increment_id' => $firstBlogger->id
        ]);
        //TODO need finish it

        // $response->assertStatus(200);
    }

    public function updateEvent($overwrites = [])
    {
        return $this->putJson(route('event.update', array_merge([
            'event' => 1,
            'decrement_id' => 323,
            'increment_id' => 223
        ], $overwrites)));
    }
}
