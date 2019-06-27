<?php

namespace App\Http\Controllers;

use App\Category;
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
        $products = Product::paginate(5);
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
        $validatedData = $request->validate([
            'name' => 'required|unique:products|max:255',
            'category_id' => 'required|numeric',
            'price' => 'required|numeric',
            'quantily' => 'required|numeric',

            'screen' => 'nullable|max:255',
            'os' => 'nullable|max:255',
            'camera' => 'nullable|max:255',
            'font_camera' => 'nullable|max:255',
            'cpu' => 'nullable|max:255',
            'gpu' => 'nullable|max:255',
            'ram' => 'nullable|max:255',
            'memory' => 'nullable|max:255',
            'sim' => 'nullable|max:255',
            'Battery_capacity' => 'nullable|max:255',
            'describe' => 'nullable',
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->quantily = $request->quantily;
        $product->describe = $request->describe;
        $product->save();

        $product_detail = new Product_Detail();
        $product_detail->product_id = $product->id;
        $product_detail->screen = $request->screen;
        $product_detail->os = $request->os;
        $product_detail->camera = $request->camera;
        $product_detail->font_camera = $request->font_camera;
        $product_detail->cpu = $request->cpu;
        $product_detail->gpu = $request->gpu;
        $product_detail->ram = $request->ram;
        $product_detail->memory = $request->memory;
        $product_detail->sim = $request->sim;
        $product_detail->Battery_capacity = $request->Battery_capacity;
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
        $product = Product::findOrFail($id);
        return view('admin.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.edit',compact('product'));
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
        $validatedData = $request->validate([
            'name' => 'required|unique:products,id,'.$id.'|max:255',
            'category_id' => 'required|numeric',
            'price' => 'required|numeric',
            'quantily' => 'required|numeric',

            'screen' => 'nullable|max:255',
            'os' => 'nullable|max:255',
            'camera' => 'nullable|max:255',
            'font_camera' => 'nullable|max:255',
            'cpu' => 'nullable|max:255',
            'gpu' => 'nullable|max:255',
            'ram' => 'nullable|max:255',
            'memory' => 'nullable|max:255',
            'sim' => 'nullable|max:255',
            'Battery_capacity' => 'nullable|max:255',
            'describe' => 'nullable'
        ]);
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->quantily = $request->quantily;
        $product->describe = $request->describe;
        $product->save();

        $product_detail = Product_Detail::where('product_id','=',$product->id)->first();
        $product_detail->screen = $request->screen;
        $product_detail->os = $request->os;
        $product_detail->camera = $request->camera;
        $product_detail->font_camera = $request->font_camera;
        $product_detail->cpu = $request->cpu;
        $product_detail->gpu = $request->gpu;
        $product_detail->ram = $request->ram;
        $product_detail->memory = $request->memory;
        $product_detail->sim = $request->sim;
        $product_detail->Battery_capacity = $request->Battery_capacity;
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

        return redirect()->route('product.index')->with('success','Edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if (count($product->comments)>0 || count($product->order_Details)>0)
        {
            return redirect()->route('product.index')->with('error','Can\'t delete product!');
        }
        $product->delete();
        return redirect()->route('product.index')->with('success','Delete product successfully!');
    }

    public function search(Request $request)
    {
        $key = $request->key;
        if (!$key == '')
        {
            $products = Product::where('id','like','%'.$key.'%')
                ->orWhere('name','like','%'.$key.'%')
                ->orWhere('price','like','%'.$key.'%')
                ->orWhere('quantily','like','%'.$key.'%')
                ->paginate(5);
//            dd($products);

            return view('admin.product.index',compact('products'));
        }
        $products = Product::paginate(5);
        return view('admin.product.index',compact('products'));

    }
}
