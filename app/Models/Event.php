<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('event_date', 'asc');
        });
    }

    public function bloggers()
    {
        return $this->belongsToMany(Blogger::class)->orderBy('blogger_order')->withPivot('blogger_order');
    }
}
