<?php

namespace App\Http\Controllers;

use App\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getCart()
    {
        $cart_contents = \Cart::getContent();
        $total = \Cart::getTotal();
        return view('cart', compact(['cart_contents','total']));
    }

    public function addCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        \Cart::add(array('id'=>$product->id,'name'=>$product->name,'price'=>$product->price,'quantity'=>1,
            'attributes'=>array('img'=>$product->images[0]->url)));
        return redirect()->route('getCart');
    }

    public function removeCart($id)
    {
        \Cart::remove($id);
        return redirect()->route('getCart');
    }
}
