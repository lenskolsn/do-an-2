<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    function index()
    {
        $product = Product::orderByDesc('id')->paginate(5);
        $category = Category::all();
        return view('admin.product.index', compact(['product', 'category']));
    }
    function add()
    {
        $category = Category::all();
        return view('admin.product.add', compact('category'));
    }
    function edit($id = null)
    {
        $product = Product::find($id);
        $category = Category::all();

        return view('admin.product.edit', compact(['product', 'category']));
    }
    function delete($id = null)
    {
        $product = Product::find($id);
        if (empty($product->order_detail)) {
            Product::destroy($id);
            toast()->success('Xóa sản phẩm thành công!');
        } else {
            toast()->error('Xóa sản phẩm không thành công!');
        }
        return back();
    }
    function store(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        $this->customValidate($data);

        $file = $request->file('image');

        if ($file) {
            $filename = $file->hashName();
            $file->storeAs("/public/images", $filename);
            $data['image'] = $filename;
        } else {
            $data['image'] = "default.png";
        }

        $product = Product::updateOrCreate($data);
        $product->save();

        toast()->success('Thêm sản phẩm thành công!');

        return redirect()->route('admin.product');
    }
    function update(Request $request, $id = null)
    {
        $data = $request->all();
        unset($data['_token']);

        $this->customValidate($data);

        $product = Product::find($id);
        $file = $request->file('image');

        if ($file) {
            $filename = $file->hashName();
            $file->storeAs("/public/images", $filename);
            $data['image'] = $filename;
            if ($product->image != 'default.png') {
                Storage::delete('/public/images/' . $product->image);
            }
        } else {
            $data['image'] = $product->image;
        }
        $product->update($data);

        toast()->success('Cập nhật sản phẩm thành công!');

        return back();
    }
    function list()
    {
        return Product::orderByDesc('id')->get();
    }
    function product_category(Request $request)
    {
        $key = $request->categoryId;

        $validator = Validator::make($request->all(), ['categoryId' => 'required'], [], ['categoryId' => 'Danh mục']);

        if ($validator->fails()) {
            toast()->warning('Vui lòng chọn tên danh mục!');
            return back();
        } else {
        }
        $product = Product::where('categoryId', $key)->get();
        $category = Category::all();
        return view('admin.product.product_category', compact(['product', 'category', 'key']));
    }
    function customValidate($data)
    {
        $validator = Validator::make($data, [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'categoryId' => 'required'
        ], [], [
            'name' => 'Tên sản phẩm',
            'price' => 'Giá',
            'description' => 'Mô tả',
            'categoryId' => 'Danh mục',
        ])->validate();
        return $validator;
    }
}
