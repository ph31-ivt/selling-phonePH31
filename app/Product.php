<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'name', 'category_id', 'price', 'quantily', 'describe'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function product_Detail()
    {
        return $this->hasOne('App\Product_Detail');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function order_Details()
    {
        return $this->hasMany('App\Order_Detail');
    }

    public static function countProduct()
    {
        $count = count(Product::get('id'));
        return $count;
    }
}
