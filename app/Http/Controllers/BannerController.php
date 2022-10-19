<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    function index(){
        $banner = Banner::orderByDesc('id')->paginate(2);
        return view('admin.banner.index',compact('banner'));
    }
    function add(){
        return view('admin.banner.add');
    }
    function store(Request $request){
        $data = $request->all();
        unset($data['_token']);
        
        $validator = Validator::make($data,[
            'image'=>'required'
        ],[],[
            'image'=>'Hình ảnh'
        ])->validate();

        $file = $request->file('image');
        if($file){
            $filename = $file->hashName();
            $file->storeAs('/public/banner',$filename);
            $data['image'] = $filename;
        }

        $banner = Banner::updateOrCreate($data);
        $banner->save();

        return back();
    }
    function delete($id){
        Banner::destroy($id);
        return back();
    }
}
