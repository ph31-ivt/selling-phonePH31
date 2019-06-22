<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'name'
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public static function countCategory()
    {
        $count = count(\DB::table('categories')->select('id')->get());
        return $count;
    }
}
