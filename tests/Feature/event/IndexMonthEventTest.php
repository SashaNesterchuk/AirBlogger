<?php

namespace Tests\Feature;

use App\Event;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Feature\event\utils\CreateEvents;
use Tests\TestCase;

class IndexMonthEventTest extends TestCase
{
    use DatabaseMigrations, CreateEvents;

    protected function setUp(): void
    {
        parent::setUp();

        $this->createEvents(Carbon::now());
    }

    /**
     * @test
     * @group Test
     */
    public function it_must_get_month_year_events()
    {
        $response = $this->indexMonthEvent();

        $response->assertStatus(200);

        $data = $response->decodeResponseJson();

        $events = Event::count();

        $this->assertEquals($events, count($data));
    }

    public function indexMonthEvent($overwrites = [])
    {
        return $this->getJson(route('event.month', array_merge([
            'year' => Carbon::now()->year,
            'month' => Carbon::now()->month
        ], $overwrites)));
    }
}
