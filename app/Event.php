<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    public function bloggers()
    {
        return $this->belongsToMany(Blogger::class);
    }
}
