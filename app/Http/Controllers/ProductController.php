<?php

namespace App\Http\Controllers;

use App\Image;
use App\Product;
use App\Product_Detail;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->quantily = $request->quantily;
        $product->save();

        $product_detail = new Product_Detail();
        $product_detail->product_id = $product->id;
        $product_detail->screen = $request->screen;
        $product_detail->os = $request->os;
        $product_detail->camera = $request->camera;
        $product_detail->font_camera = $request->font_camera;
        $product_detail->cpu = $request->cpu;
        $product_detail->ram = $request->ram;
        $product_detail->memory = $request->memory;
        $product_detail->sim = $request->sim;
        $product_detail->save();

        if($request->file('images_up')){
            foreach($request->file('images_up') as $image){
                $path=$image->store('images');
                $img= Image::create([
                    'url' =>$path,
                    'product_id' => $product->id
                ]);
            }
        }

        return redirect()->route('product.create')->with('success','Create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
