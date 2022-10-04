<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    function index()
    {
        $user = User::orderBy('id', 'desc')->paginate(5);
        return view('admin.user.index', compact('user'));
    }
    function add()
    {
        return view('admin.user.add');
    }
    function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }
    function store(Request $request, $id = null)
    {
        $data = $request->all();
        unset($data['_token']);

        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => $id ? 'required|email' : 'required|email|unique:users', // Nếu cập nhật thì bỏ validate unique
            'password' => $id ? '' : 'required',
            'confirm_password' => $id ? '' : 'required|same:password',
        ], [], [
            'name' => 'Họ tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'confirm_password' => 'Nhập lại mật khẩu',
        ])->validate();

        $file = $request->file('avatar');

        if ($id) {
            $userOld = User::find($id);
            if($file != null && $userOld->avatar != 'default.png'){
                Storage::delete('/public/avatar/'.$userOld->avatar);
            }else{
                $data['avatar'] = $userOld->avatar;
            }
            $data['password'] = $userOld->password;
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        if ($file != null) {
            $filename = $file->hashName();
            $file->storeAs("/public/avatar", $filename);
            $data["avatar"] = $filename;
        }else{
            $data['avatar'] = 'default.png';
        }

        unset($data['confirm_password']);

        $user = User::updateOrCreate(['id'=>$id],$data);
        $user->save();

        return redirect()->route('admin.user');
    }
    function delete($id)
    {
        User::destroy($id);
        return back();
    }
}
