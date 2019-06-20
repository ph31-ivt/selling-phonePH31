<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'user_id', 'order_date', 'name', 'tel', 'address' ,'total', 'status'
    ];
}
