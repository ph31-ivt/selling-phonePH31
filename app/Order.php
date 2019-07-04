<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    CONST pending = 1;
    CONST approved  = 2;
    CONST shipping  = 3;
    CONST cancel  = 4;
    //
    protected $fillable = [
        'user_id', 'order_date', 'name', 'tel', 'address' ,'total', 'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function order_Details()
    {
        return $this->hasMany('App\Order_Detail');
    }
}
