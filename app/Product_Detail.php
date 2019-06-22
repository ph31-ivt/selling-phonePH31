<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Detail extends Model
{
    //
    protected $table = 'product_details';

    protected $fillable = [
        'product_id', 'screen', 'os', 'camera', 'font_camera', 'cpu', 'ram', 'memory', 'sim'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
