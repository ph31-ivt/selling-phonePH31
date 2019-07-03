<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::take(6)->get();
        return view('index',compact('products'));
    }

    public function productDetail($id)
    {
        $product = Product::findOrFail($id);
        return view('product_detail',compact('product'));
    }
}
