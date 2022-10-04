<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $firstCategory = Category::first();
        $product = Product::all();
        return view('welcome', compact('product'));
    }
    function search(Request $request)
    {
        $key = $request->key;
        $product = Product::where('name', 'like', '%' . $key . '%')->get();
        return view('search',compact(['product','key']));
    }
    function about()
    {
        return view('about');
    }
    function news()
    {
        $post = Post::all();
        $post_new = Post::orderByDesc('id')->get();
        return view('news',compact(['post','post_new']));
    }
    function new_detail($id=null)
    {
        $post = Post::find($id);
        $posts = Post::orderByDesc('id')->get();
        $comment = Comment::orderByDesc('id')->get();
        return view('new_detail',compact(['post','posts','comment']));
    }
    function product($id = null)
    {
        $category = Category::find($id);
        $product = Product::where('categoryId', $id)->get();
        return view('product')->with(['category' => $category, 'product' => $product]);
    }
}
