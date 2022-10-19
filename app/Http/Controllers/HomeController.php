<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    function index()
    {
        $firstCategory = Category::first();
        $product = Product::all();
        return view('welcome', compact('product','firstCategory'));
    }
    function search(Request $request)
    {
        $key = $request->key;
        $product = Product::where('name', 'like', '%' . $key . '%')->get();
        return view('search', compact(['product', 'key']));
    }
    function about()
    {
        return view('about');
    }
    function news()
    {
        $post = Post::all();
        $post_new = Post::orderByDesc('id')->get();
        return view('news', compact(['post', 'post_new']));
    }
    function new_detail($id = null)
    {
        $post = Post::find($id);
        // Lấy ra bài viết mới nhất
        $posts = Post::orderByDesc('id')->get();
        // Lấy ra comment   
        $comment = Comment::orderBy('id', 'desc')->get();
        // Tăng lượt xem khi click vào
        $post->update(['views' => $post->views + 1]);
        $post->save();

        return view('new_detail', compact(['post', 'posts', 'comment']));
    }
    function product($id = null)
    {
        $category = Category::find($id);
        $product = Product::where('categoryId', $id)->get();
        return view('product')->with(['category' => $category, 'product' => $product]);
    }
    function contact()
    {
        return view('contact');
    }
    function contact_store(Request $request)
    {

        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|min:8|max:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'content' => 'required',
        ], [], [
            'name' => 'Họ tên',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
            'content' => 'Nội dung',
        ]);
        if (!Auth::guard('customer')->check()) {
            alert()->warning('Bạn chưa đăng nhập!', ' Vui lòng đăng nhập và thử lại sau.');
        } else if ($validator->fails()) {
            $errors = $validator->errors()->first();
            toast($errors, 'warning');
        } else {
            Contact::create($data);
            Alert::success('success', 'Cảm ơn bạn đã liên hệ cho chúng tôi!');
        }
        return back();
    }
    function menu(){
        $category = Category::orderByDesc('id')->get();
        return view('menu',compact('category'));
    }
    function product_detail($id = null){
        $product= Product::find($id);
        return view('product_detail',compact('product'));
    }
}
