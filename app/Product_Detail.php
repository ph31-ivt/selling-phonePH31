<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Detail extends Model
{
    //
    protected $fillable = [
        'product_id', 'screen', 'os', 'camera', 'font_camera', 'cpu', 'ram', 'memory', 'sim'
    ];
}
