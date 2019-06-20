<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'product_id', 'user_id', 'content', 'date_time'
    ];
}
