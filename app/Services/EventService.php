<?php


namespace App\Services;

use App\Models\Blogger;
use App\Models\Event;

class EventService
{
    private $blogger;

    private $event;

    public function __construct(int $blogger_id, Event $event)
    {
        $this->event = $event;

        $this->blogger = $event->bloggers()->where('blogger_id', $blogger_id)->first();
    }

    public function upOrder()
    {
        $secondBlogger = $this->event->bloggersOrderDesc()
            ->where('blogger_order', '<', $this->blogger->pivot->blogger_order)
            ->first();

        $this->updateBloggerOrder($secondBlogger);
    }

    public function downOrder()
    {
        $secondBlogger = $this->event->bloggers()
            ->where('blogger_order', '>', $this->blogger->pivot->blogger_order)
            ->first();

        $this->updateBloggerOrder($secondBlogger);
    }

    private function updateBloggerOrder(Blogger $secondBlogger)
    {
        $this->event->bloggers()->updateExistingPivot($secondBlogger->id, ['blogger_order' => $this->blogger->pivot->blogger_order]);

        $this->event->bloggers()->updateExistingPivot($this->blogger->id, ['blogger_order' => $secondBlogger->pivot->blogger_order]);
    }
}
