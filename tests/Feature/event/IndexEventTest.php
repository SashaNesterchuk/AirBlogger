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

class IndexEventTest extends TestCase
{
    use DatabaseMigrations, CreateEvents;

    protected function setUp(): void
    {
        parent::setUp();

        $this->createEvents(Carbon::now());
    }


    /**
     * @test
     */
    public function it_must_group_by_month_event()
    {
        $response = $this->indexEvent();

        $response->assertStatus(200);

        $data = $response->decodeResponseJson();

        $this->assertTrue(array_key_exists(Carbon::now()->month, $data));

        $this->assertEquals(1, count($data));
    }

    /**
     * @test
     */
    public function it_must_sort_by_order_event()
    {
        $response = $this->indexEvent();

        $response->assertStatus(200);

        $event = Event::with('bloggers')->first();

        $order = 1;

        foreach ($event->bloggers as $blogger) {
            $this->assertEquals($order, $blogger->pivot->blogger_order);

            $order++;
        }
    }

    public function indexEvent($overwrites = [])
    {
        return $this->getJson(route('event.index', array_merge([
            'year' => Carbon::now()->year
        ], $overwrites)));
    }
}
