<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    public $timestamps = false;

    /**
     * Get all of the posts that are assigned this tag.
     */
    public function posts()
    {
        return $this->morphedByMany('App\Post', 'taggable');
    }

    /**
     * Get all of the posts that are assigned this tag.
     */
    public function users()
    {
        return $this->morphedByMany('App\User', 'taggable');
    }
}
