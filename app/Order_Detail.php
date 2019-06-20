<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    //
    protected $fillable = [
        'order_id', 'product_id', 'quantily', 'price', 'total_detail'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

}
