<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    function index(){
        return view("admin.login");
    }
    function store_login(Request $request){
        unset($request['_token']);

        $data = $request->all();

        $validator = Validator::make($data,[
            'email'=>'required',
            'password'=>'required'
        ],[],[
            'email'=>'Email',
            'password'=>'Password'
        ])->validate();

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->back();
        }

    }
    function register(){
        return view('admin.register');
    }
    function store_register(Request $request){
        $data = $request->all();
        unset($data['_token']);

    
        $validator = Validator::make($data,[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:6',
            'confirm_password'=>'required|same:password',
        ],[],[
            'name'=>'Name',
            'email'=>'Email',
            'password'=>'Passowrd',
            'confirm_password'=>'Confirm Password',
        ])->validate();

        unset($data['confirm_password']);

        $user = User::updateOrCreate($data);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('admin.login');
    }
    function dashboard(){
        $product_category = Category::count();
        return view("admin.dashboard",compact('product_category'));
    }
    function logout(Request $request){
        Auth::logout();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
