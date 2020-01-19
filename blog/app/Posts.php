<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = [
        'title',
        'user_id'
    ];
    /**
     * Get all of the post's taggables.
     */
    public function taggables()
    {
        return $this->morphMany('App\Taggables', 'taggable');
    }
}
