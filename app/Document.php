<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['title', 'description', 'sender_id', 'receiver_id', 'file'];

}
