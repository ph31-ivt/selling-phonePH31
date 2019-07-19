<?php

namespace App\Http\Controllers;

use App\Image;
use App\Product;
use Illuminate\Http\Request;

class searchController extends Controller
{
    public function index(Request $request){
        $key = $request->key;
        $products = Product::where('name','like','%'.$key.'%')->get();
        return view('search', compact(['products','key']));
    }

    public function autocomplete(Request $request)
    {
        $data = Product::with('images')->where("name","LIKE","%{$request->input('query')}%")
            ->get(["name", "id", "price"])->toArray();
//        dd($data);
        return response()->json($data);
    }

}
