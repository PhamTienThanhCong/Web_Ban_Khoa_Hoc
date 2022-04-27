<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class authAdminController extends Controller
{
    public function register(Request $request){
        try {
            $admin = admin::query()
            ->create([
                'name'  => $request->get('name'),
                'email' => $request->get('email'),
                'description'  => $request->get('description'),
                'password' => Hash::make($request->get('password')),
                'token' => bin2hex(random_bytes(16)),
            ]);
            return redirect()->route('admin.login')->with('success','Đăng kí tài khoản thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.register')->with('error','Email Đã được sử dụng');
        }
    }
    public function login(Request $request){
        try {
            $admin = admin::query()
            ->where('email', $request->get('email'))
            ->firstOrFail();
            if (!Hash::check($request->get('password'), $admin->password)){
                return redirect()->route('admin.login')->with('error','Tài khoản hoặc mật khẩu không đúng');
            }
            if ($admin->lever == 0){
                return redirect()->route('admin.login')->with('success','Tài khoản của bạn đang chờ xác nhận, vui đăng nhập sau ');
            }
            session()->put('id', $admin->id);
            session()->put('name', $admin->name);
            session()->put('image', $admin->image);
            session()->put('lever', $admin->lever);
            if ($admin->lever == 2){
                return redirect()->route('admin.overview');
            }else if ($admin->lever == 1){
                return redirect()->route('seller.overview');
            }
        } catch (\Throwable $th) {
            return redirect()->route('admin.login')->with('error','ông đúng');
        }
    }
    public function logout(){
        session()->flush();
        return redirect()->route('admin.login');
    }
}
