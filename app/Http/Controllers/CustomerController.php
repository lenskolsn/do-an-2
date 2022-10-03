<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
    function index(){
        $customer = Customer::orderBy('id','desc')->get();
        return view('admin.customer.index',compact('customer'));
    }
    function add(){
        return view('admin.customer.add');
    }
    function edit($id){
        $customer = Customer::find($id);
        return view('admin.customer.edit',compact('customer'));
    }
    function delete($id){
        Customer::destroy($id);
        return back();
    }
    function store(Request $request, $id = null){
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => $id ? '' : 'required',
            'confirm_password' => $id ? '' : 'required|same:password'
        ], [], [
            'name' => 'Họ tên',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
            'password' => 'Mật khẩu',
            'confirm_password' => 'Nhập lại mật khẩu'
        ])->validate();

        unset($data['_token']);
        unset($data['confirm_password']);

        $data['password'] = Hash::make($request->password);

        $file = $request->file('avatar');
        
        if ($id) {
            $cusOld = Customer::find($id);
            if($file != null && $cusOld->avatar != 'default.png'){
                Storage::delete('/public/avatar/'.$cusOld->avatar);
            }else{
                $data['avatar'] = $cusOld->avatar;
            }
            $data['password'] = $cusOld->password;
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        if($file){
            $filename = $file->hashName();
            $file->storeAs('/public/avatar',$filename);
            $data['avatar'] = $filename;
        }else{
            $data['avatar'] = 'default.png';
        }

        $cus = Customer::updateOrCreate(['id'=>$id],$data);
        $cus->save();

        return redirect()->route('admin.customer');
    }
}
