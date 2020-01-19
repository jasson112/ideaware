<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'user_id'
    ];

    /**
     * Get all of the post's taggables.
     */
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }
}
