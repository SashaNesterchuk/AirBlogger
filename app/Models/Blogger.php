<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blogger extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
}
