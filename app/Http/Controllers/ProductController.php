<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index(){
        return view('admin.product.index');
    }
    function list(){
        return Product::orderByDesc('id')->get();
    }
}
