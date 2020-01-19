<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taggable extends Model
{
    public $timestamps = false;

    /**
     * Get all of the posts that are assigned this tag.
     */
    public function posts()
    {
        return $this->morphedByMany('App\Post', 'taggable');
    }
}
