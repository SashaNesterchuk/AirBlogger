<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\EventIndexMonthRequest;
use App\Http\Requests\EventIndexRequest;
use App\Http\Requests\EventUpdateRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EventIndexRequest $request)
    {
        $events = Event::whereYear('event_date', $request->year)
            ->get()
            ->groupBy(function ($val) {
                return Carbon::parse($val->event_date)->format('n');
            });

        return response($events);
    }

    /**
     * Display a listing month of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function indexMonth(EventIndexMonthRequest $request)
    {
        $events = Event::whereYear('event_date', $request->year)
            ->whereMonth('event_date', $request->month)
            ->get();

        return response($events);
    }

    /**
     * Display the specified resource.
     *
     * @param Event $event
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return response($event->load('bloggers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Event $event
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(EventUpdateRequest $request, Event $event)
    {
        $event->bloggers()->where('blogger_id', $request->decrement_id)->decrement('blogger_order', 1);

        $event->bloggers()->where('blogger_id', $request->increment_id)->increment('blogger_order', 1);

        return response($event->load('bloggers'));
    }
}
