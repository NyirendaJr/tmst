<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Comment extends Model
{
    protected $guarded = [];

    /**
     * Get the comment's ..time ago.
     *
     * @param  string  $value
     * @return string
     */
    public function getcreated_atAttribute($value)
    {
        return Carbon::diffForHumans($value);
    }
}
