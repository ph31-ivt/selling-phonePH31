<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::withCount('comments')->orderby('comments_count','desc')->paginate(10);
        return view('admin.comment.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id)
    {
        if (\auth::check()){
            $comment = new Comment;
            $comment->content = $request->contents;
            $comment->product_id = $product_id;
            $comment->user_id = \auth()->user()->id;
            $comment->date_time = date('Y-m-d H:i:s');
            $comment->save();
            return redirect()->route('productDetail',$product_id);
        } else {
            return redirect()->route('login')->with('error', 'Please login before comment!');
        }
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
        $comments = Comment::where('product_id','=',$id)->orderby('date_time','desc')->paginate(5);
        return view('admin.comment.show', compact(['product','comments']));
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
    public function destroy($product_id, $user_id, $content)
    {
        $comment = DB::table('comments')
            ->where('product_id', '=', $product_id)
            ->where('user_id', '=', $user_id)
            ->where('content', 'like', $content)->delete();
        return redirect()->route('comment.show', $product_id);

    }
}
