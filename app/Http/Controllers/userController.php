<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function login(){
        return view('content.user.login');
    }
    public function register(Request $request){
        try {
            $user = user::query()
            ->create([
                'name'  => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
                'token' => bin2hex(random_bytes(16)),
            ]);
            return redirect()->route('user.login')->with('success','Đăng kí tài khoản thành công');
        } catch (\Throwable $th) {
            return redirect()->route('user.login')->with('error','Email nãy lỗi hoặc Đã được sử dụng');
        }
    }
    public function myAccount(){
        return view('content.user.myAccount');
    }
}
