<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::take(6)->get();
        return view('indexh',compact('products'));
    }

    public function productDetail($id)
    {
        $product = Product::findOrFail($id);
        $comments = Comment::where('product_id','=',$id)->orderby('date_time','desc')->paginate(5);
        return view('product_detail',compact(['product','comments']));
    }
}
