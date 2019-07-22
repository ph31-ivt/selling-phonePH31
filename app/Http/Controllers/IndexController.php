<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::where('quantily','>',0)
            ->orderBy('created_at','desc')
            ->take(6)
            ->get();
        $product_hots = Product::withCount('order_details')
            ->where('quantily','>',0)
            ->orderBy('order_details_count','desc')
            ->take(6)
            ->get();
        return view('index',compact(['products','product_hots']));
    }

    public function productDetail($id)
    {
        $product = Product::findOrFail($id);
        $comments = Comment::where('product_id','=',$id)->orderby('date_time','desc')->paginate(10);
        return view('product_detail',compact(['product','comments']));
    }

    public function getCategory()
    {
        $products = Product::paginate(10);
        return view('category',compact('products'));
    }

    public function getProductByCategory($id)
    {
        $productBycategory = Product::where('category_id','=',$id)->get();
        return view('category',compact('productBycategory'));
    }
}
