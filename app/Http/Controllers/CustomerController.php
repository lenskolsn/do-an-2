<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    function info()
    {
        return view('info');
    }
    function login()
    {
        return view('login');
    }
    function login_store(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        $validator = Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required',
        ], [], [
            'email' => 'Email',
            'password' => 'Mật khẩu',
        ])->validate();

        if (Auth::guard('customer')->attempt($data)) {
            $request->session()->regenerate();
            
            return redirect()->route('home');
        }else{
            return redirect()->back();
        }

        return view('login');
    }
    function register()
    {
        return view('register');
    }
    function register_store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ], [], [
            'name' => 'Họ tên',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
            'password' => 'Mật khẩu',
            'confirm_password' => 'Nhập lại mật khẩu',
        ])->validate();

        unset($data['_token']);
        unset($data['confirm_password']);
        $data['password'] = Hash::make($request->password);
        $data['avatar'] = 'default.png';

        $cus = Customer::updateOrCreate($data);
        $cus->save();

        return redirect()->route('home.login');
    }
}
