<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'product_id', 'user_id', 'content', 'date_time'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function countComment()
    {
        $count = count(Comment::get('id'));
        return $count;
    }
}
